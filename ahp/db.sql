-- Schema for AHP app (from Google Sheet example)
CREATE DATABASE IF NOT EXISTS ahp_from_sheet DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE ahp_from_sheet;

CREATE TABLE IF NOT EXISTS runs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  description VARCHAR(255),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS run_criteria (
  id INT AUTO_INCREMENT PRIMARY KEY,
  run_id INT,
  idx INT,
  name VARCHAR(255),
  weight DOUBLE,
  FOREIGN KEY (run_id) REFERENCES runs(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS run_alternatives (
  id INT AUTO_INCREMENT PRIMARY KEY,
  run_id INT,
  idx INT,
  name VARCHAR(255),
  final_score DOUBLE,
  FOREIGN KEY (run_id) REFERENCES runs(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS run_alt_weights (
  id INT AUTO_INCREMENT PRIMARY KEY,
  run_id INT,
  crit_idx INT,
  alt_idx INT,
  weight DOUBLE,
  FOREIGN KEY (run_id) REFERENCES runs(id) ON DELETE CASCADE
);
