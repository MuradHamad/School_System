<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.breadcrumb {
    list-style: none;
    display: flex;
    padding: 10px 16px;
    background-color: #f1f1f1;
    border-radius: 5px;
    font-size: 16px;
}
.breadcrumb li {
    display: inline;
    font-weight: 500;
}
.breadcrumb li + li:before {
    content: "›";
    padding: 0 10px;
    color: #555;
}
.breadcrumb li a {
    text-decoration: none;
    color: #007bff;
}
.breadcrumb li a:hover {
    color: #0056b3;
}
.breadcrumb li:last-child a {
    color: #555;
    pointer-events: none;
}
</style>


</head>
<body>
    <?php
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "school";
        $conn = new mysqli($server,$user,$pass,$database);
        if($conn->connect_error){
            die("connection failed.");
        }
        $pages = [
            '../partial/nav.html' => ['title' => 'home', 'parent' => null],
        
            
            'grade_report.php' => ['title' => 'Grades', 'parent' => '../partial/nav.html'],
            'grade_form.php' => ['title' => 'Add/Edit Grade', 'parent' => 'grade_report.php'],
            'grade_update.php' => ['title' => 'Update Grade', 'parent' => 'grade_report.php'],
        
            
            'grade_subject_report.php' => ['title' => 'Grade Subjects', 'parent' => '../partial/nav.html'],
            'grade_subject_form.php' => ['title' => 'Add/Edit Grade Subject', 'parent' => 'grade_subject_report.php'],
            'grade_subject_update.php' => ['title' => 'Update Grade Subject', 'parent' => 'grade_subject_report.php'],
        
            
            'mark_select.php' => ['title' => 'Select Marks', 'parent' => '../partial/nav.html'],
            'mark_report.php' => ['title' => 'Marks', 'parent' => 'mark_select.php'],
            'mark_form.php' => ['title' => 'Add/Edit Marks', 'parent' => 'mark_report.php'],
            'mark_update.php' => ['title' => 'Update Marks', 'parent' => 'mark_report.php'],
        
            
            'student_report.php' => ['title' => 'Students', 'parent' => '../partial/nav.html'],
            'student_form.php' => ['title' => 'Add/Edit Student', 'parent' => 'student_report.php'],
            'student_update.php' => ['title' => 'Update Student', 'parent' => 'student_report.php'],
        
            
            'subject_report.php' => ['title' => 'Subjects', 'parent' => '../partial/nav.html'],
            'subject_form.php' => ['title' => 'Add/Edit Subject', 'parent' => 'subject_report.php'],
            'subject_update.php' => ['title' => 'Update Subject', 'parent' => 'subject_report.php'],
        
            
            'teacher_report.php' => ['title' => 'Teachers', 'parent' => '../partial/nav.html'],
            'teacher_form.php' => ['title' => 'Add/Edit Teacher', 'parent' => 'teacher_report.php'],
            'teacher_update.php' => ['title' => 'Update Teacher', 'parent' => 'teacher_report.php'],
        ];
        $current_page = 'students';  
        function buildBreadcrumb($current_page) {
            global $pages;
            echo "<ul class='breadcrumb'>";
            $breadcrumb = "";
            while ($current_page) {
                $page = $pages[$current_page];
                $breadcrumb = "<li><a href='$current_page'>{$page['title']}</a></li>" . $breadcrumb;
                $current_page = $page['parent'];
            }
            $breadcrumb .= "</ul>";
            echo $breadcrumb;
        }

        
        
    ?>
</body>
</html>