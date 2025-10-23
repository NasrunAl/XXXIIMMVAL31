// app.js - build UI and pack questionnaire answers
document.addEventListener('DOMContentLoaded', function(){
  const steps = document.querySelectorAll('.step');
  const stepBtns = document.querySelectorAll('.step-btn');
  function go(s){ steps.forEach((sec,idx)=> sec.classList.toggle('hidden', (idx+1)!==s)); stepBtns.forEach((b,idx)=> b.classList.toggle('active',(idx+1)===s)); window.scrollTo({top:0,behavior:'smooth'}); }
  stepBtns.forEach((b,idx)=> b.addEventListener('click', ()=> go(idx+1)));

  const makeBtn = document.getElementById('makeBtn'), namesArea = document.getElementById('namesArea');
  const numCrit = document.getElementById('numCrit'), numAlt = document.getElementById('numAlt');
  makeBtn.addEventListener('click', ()=> renderNames());

  document.getElementById('fillSample').addEventListener('click', ()=>{
    numCrit.value=3; numAlt.value=4; renderNames();
    const crits = document.querySelectorAll('.crit'); crits[0].value='Tanggung Jawab'; crits[1].value='Jujur'; crits[2].value='Disiplin';
    const alts = document.querySelectorAll('.alt'); alts[0].value='Callista'; alts[1].value='Salwa'; alts[2].value='Nabila'; alts[3].value='Dewi';
  });

  function renderNames(){
    namesArea.innerHTML='';
    const nC = parseInt(numCrit.value), nA = parseInt(numAlt.value);
    const d1=document.createElement('div'); d1.innerHTML='<h4>Kriteria</h4>';
    for(let i=0;i<nC;i++){ const inp=document.createElement('input'); inp.className='crit'; inp.placeholder='Kriteria '+(i+1); d1.appendChild(inp); d1.appendChild(document.createElement('br')); }
    const d2=document.createElement('div'); d2.innerHTML='<h4>Alternatif (Mahasiswa)</h4>';
    for(let i=0;i<nA;i++){ const inp=document.createElement('input'); inp.className='alt'; inp.placeholder='Mahasiswa '+(i+1); d2.appendChild(inp); d2.appendChild(document.createElement('br')); }
    namesArea.appendChild(d1); namesArea.appendChild(d2);
  }

  document.getElementById('toCrit').addEventListener('click', ()=> {
    const crits=Array.from(document.querySelectorAll('.crit')).map(i=>i.value.trim()||i.placeholder);
    const alts=Array.from(document.querySelectorAll('.alt')).map(i=>i.value.trim()||i.placeholder);
    if(crits.length<1 || alts.length<2){ alert('Isi minimal 1 kriteria dan 2 alternatif'); return; }
    document.getElementById('criteria_names').value = JSON.stringify(crits);
    document.getElementById('alt_names').value = JSON.stringify(alts);
    buildCritQ(crits);
    go(2);
  });

  document.getElementById('back1').addEventListener('click', ()=> go(1));
  document.getElementById('toAltQ').addEventListener('click', ()=> { packCritQ(); buildAltQ(); go(3); });
  document.getElementById('back2').addEventListener('click', ()=> go(2));
  document.getElementById('toReview').addEventListener('click', ()=> { packAltQ(); buildReview(); go(4); });
  document.getElementById('back3').addEventListener('click', ()=> go(3));

  // build criteria questionnaire: pairs with select scale
  function buildCritQ(crits){
    const wrap=document.getElementById('critQ'); wrap.innerHTML='';
    const n=crits.length; const grid=document.createElement('div'); grid.className='matrix'; grid.style.setProperty('--n', n);
    for(let i=0;i<n;i++){ const lbl=document.createElement('div'); lbl.textContent=crits[i]; lbl.style.fontWeight='700'; grid.appendChild(lbl); }
    for(let i=0;i<n;i++){ for(let j=0;j<n;j++){
      const cell=document.createElement('div');
      if(i===j){ const inp=document.createElement('input'); inp.value='1'; inp.disabled=true; cell.appendChild(inp); }
      else if(i<j){ const sel=scaleSelect('crit_'+i+'_'+j); cell.appendChild(sel); }
      else{ const inp=document.createElement('input'); inp.disabled=true; inp.dataset.recip='crit_'+j+'_'+i; cell.appendChild(inp); }
      grid.appendChild(cell);
    }} wrap.appendChild(grid);
  }

  // build alt questionnaire per criterion
  function buildAltQ(){
    const wrap=document.getElementById('altQ'); wrap.innerHTML='';
    const crits = JSON.parse(document.getElementById('criteria_names').value);
    const alts = JSON.parse(document.getElementById('alt_names').value);
    for(let k=0;k<crits.length;k++){
      const box=document.createElement('div'); box.innerHTML='<h4>Kriteria: '+crits[k]+'</h4>';
      const grid=document.createElement('div'); grid.className='matrix'; grid.id='alt_mat_'+k; grid.style.setProperty('--n', alts.length);
      for(let i=0;i<alts.length;i++){ const lbl=document.createElement('div'); lbl.textContent=alts[i]; lbl.style.fontWeight='700'; grid.appendChild(lbl); }
      for(let i=0;i<alts.length;i++){ for(let j=0;j<alts.length;j++){
        const cell=document.createElement('div');
        if(i===j){ const inp=document.createElement('input'); inp.value='1'; inp.disabled=true; cell.appendChild(inp); }
        else if(i<j){ const sel=scaleSelect('alt_'+k+'_'+i+'_'+j); cell.appendChild(sel); }
        else{ const inp=document.createElement('input'); inp.disabled=true; inp.dataset.recip='alt_'+k+'_'+j+'_'+i; cell.appendChild(inp); }
        grid.appendChild(cell);
      }}
      box.appendChild(grid); wrap.appendChild(box);
    }
  }

  // create select element with AHP scale options
  function scaleSelect(name){
    const sel=document.createElement('select'); sel.dataset.name=name;
    const opts=[{v:9,t:'9 (Mutlak sangat penting)'},{v:8,t:'8'},{v:7,t:'7 (Mutlak lebih penting)'},{v:6,t:'6'},{v:5,t:'5 (Lebih penting)'},{v:4,t:'4'},{v:3,t:'3 (Sedikit lebih penting)'},{v:2,t:'2'},{v:1,t:'1 (Sama penting)'}];
    opts.forEach(o=>{ const op=document.createElement('option'); op.value=o.v; op.textContent=o.t; sel.appendChild(op); });
    sel.addEventListener('change', ()=> { fillReciprocal(sel); });
    return sel;
  }

  function fillReciprocal(sel){
    const name = sel.dataset.name; const val = parseFloat(sel.value);
    document.querySelectorAll('[data-recip]').forEach(inp=>{ if(inp.dataset.recip===name){ inp.value = (1/val).toFixed(4); } });
  }

  function packCritQ(){
    const crits = JSON.parse(document.getElementById('criteria_names').value);
    const n=crits.length; const mat = [];
    for(let i=0;i<n;i++){ mat[i]=[]; for(let j=0;j<n;j++){
      if(i===j) mat[i][j]=1;
      else if(i<j){ const sel=document.querySelector('select[data-name="crit_'+i+'_'+j+'"]'); mat[i][j]= parseFloat(sel.value); }
      else{ const inp=document.querySelector('input[data-recip="crit_'+j+'_'+i+'"]'); mat[i][j]= parseFloat(inp.value); }
    }}
    document.getElementById('crit_matrix').value = JSON.stringify(mat);
  }

  function packAltQ(){
    const crits = JSON.parse(document.getElementById('criteria_names').value);
    const alts = JSON.parse(document.getElementById('alt_names').value);
    const all = [];
    for(let k=0;k<crits.length;k++){
      const n=alts.length; const mat=[];
      for(let i=0;i<n;i++){ mat[i]=[]; for(let j=0;j<n;j++){
        if(i===j) mat[i][j]=1;
        else if(i<j){ const sel=document.querySelector('select[data-name="alt_'+k+'_'+i+'_'+j+'"]'); mat[i][j]= parseFloat(sel.value); }
        else{ const inp=document.querySelector('input[data-recip="alt_'+k+'_'+j+'_'+i+'"]'); mat[i][j]= parseFloat(inp.value); }
      }}
      all.push(mat);
    }
    document.getElementById('alt_matrices').value = JSON.stringify(all);
  }

  function buildReview(){
    packCritQ(); packAltQ();
    const crits = JSON.parse(document.getElementById('criteria_names').value);
    const alts = JSON.parse(document.getElementById('alt_names').value);
    const review = document.getElementById('review');
    review.innerHTML = '<h4>Kriteria</h4><ul>'+crits.map(c=>'<li>'+c+'</li>').join('')+'</ul>';
    review.innerHTML += '<h4>Alternatif</h4><ul>'+alts.map(a=>'<li>'+a+'</li>').join('')+'</ul>';
    review.innerHTML += '<h4>Preview Matriks Kriteria</h4><pre>'+document.getElementById('crit_matrix').value+'</pre>';
    review.innerHTML += '<h4>Preview Matriks Alternatif</h4><pre>'+document.getElementById('alt_matrices').value+'</pre>';
  }

  // initial
  renderNames = function(){ namesArea.innerHTML=''; const nC=parseInt(numCrit.value), nA=parseInt(numAlt.value); const d1=document.createElement('div'); d1.innerHTML='<h4>Kriteria</h4>'; for(let i=0;i<nC;i++){ const inp=document.createElement('input'); inp.className='crit'; inp.placeholder='Kriteria '+(i+1); d1.appendChild(inp); d1.appendChild(document.createElement('br')); } const d2=document.createElement('div'); d2.innerHTML='<h4>Alternatif (Mahasiswa)</h4>'; for(let i=0;i<nA;i++){ const inp=document.createElement('input'); inp.className='alt'; inp.placeholder='Mahasiswa '+(i+1); d2.appendChild(inp); d2.appendChild(document.createElement('br')); } namesArea.appendChild(d1); namesArea.appendChild(d2); };
  renderNames();
});
