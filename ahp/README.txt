AHP Web App (from provided Google Sheet) - ZIP package

Reference Google Sheet (sample pairwise values & example): 
https://docs.google.com/spreadsheets/d/1tlfmsbaIld9aWzTrWYGbEN32Ht9JmIiq/edit?usp=sharing. 
The sheet shows example criteria matrix [1 3 8; 1/3 1 3; 1/8 1/3 1] and low CR. citeturn0view0

Files included:
- index.php (multi-step questionnaire UI)
- process.php (compute AHP, save runs/weights/results to DB)
- history.php, view_run.php (view saved runs)
- db_config.php (create DB if missing; edit credentials)
- db.sql (schema)
- assets/css/style.css, assets/js/app.js
- README.txt

Setup quick:
1. Extract to webroot (e.g., /var/www/html/ahp_from_sheet).
2. (Optional) Import db.sql: mysql -u root -p < db.sql
3. Edit db_config.php if your MySQL user/pass differ.
4. Open index.php in browser, follow steps, submit — results saved in DB.
