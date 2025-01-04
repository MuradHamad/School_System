<?php
include '../../AccessBySession.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
      }

      body {
        background-color: #f0f8ff;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }

      .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        max-width: 1000px;
        padding: 20px;
      }

      .card {
        background-color: #ffffff;
        border: 1px solid #d1e7ff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
      }

      .card a {
        text-decoration: none;
        color: #007bff;
        font-size: 18px;
        font-weight: bold;
        display: block;
      }

      .card a:hover {
        text-decoration: underline;
        color: #0056b3;
      }

      .card-icon {
        font-size: 40px;
        color: #007bff;
        margin-bottom: 10px;
      }
      .sign-out-link {
      position: fixed;       
      bottom: 20px;          
      right: 20px;           
      background-color: #007bff; 
      color: white;          
      padding: 10px 20px;     
      border-radius: 5px;    
      text-decoration: none; 
      font-weight: bold;     
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
      transition: background-color 0.3s; 
      }

      .sign-out-link:hover {
        background-color: #0056b3; 
      }

    </style>
  </head>
  <body>
    <div class="card-container">
      <div class="card">
        <div class="card-icon">📊</div>
        <a href="../grade/grade_report.php">Grade</a>
      </div>
      <div class="card">
        <div class="card-icon">👩‍🎓</div>
        <a href="../student/student_report.php">Student</a>
      </div>
      <div class="card">
        <div class="card-icon">👨‍🏫</div>
        <a href="../teacher/teacher_report.php">Teacher</a>
      </div>
      <div class="card">
        <div class="card-icon">📝</div>
        <a href="../mark/mark_select.php">Mark</a>
      </div>
      <div class="card">
        <div class="card-icon">📚</div>
        <a href="../subject/subject_report.php">Subject</a>
      </div>
      <div class="card">
        <div class="card-icon">🔗</div>
        <a href="../grade_subject/grade_subject_report.php">Grade & Subject</a>
      </div>
    </div>
    <a href="signout.php" class="sign-out-link">Sign Out</a>
  </body>
</html>
