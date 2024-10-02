<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dynwebpage";

$conn = new mysqli($servername, $username,$password , $dbname);

if ($conn->connect_error) {
    die('Conexión fallida: ' . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $names = trim($_POST['Names']);
    $surNames = trim($_POST['SurNames']);
    $email = trim($_POST['Email']);
    $phone = trim($_POST['Phone']);

    // Inserción en la tabla maindata
    $stmt_insert_user = $conn->prepare("INSERT INTO maindata(names, surnames, email, phone) VALUES (?, ?, ?, ?)");
    $stmt_insert_user->bind_param("ssss", $names, $surNames, $email, $phone);
    
    if (!$stmt_insert_user->execute()) {
        echo "Error al insertar usuario: " . $stmt_insert_user->error;
        exit;
    }

    $user_id = $stmt_insert_user->insert_id;

// Inserción en la tabla experience
if (isset($_POST['organization'])) {
    foreach ($_POST['organization'] as $index => $organization) {
        $position = $_POST['job'][$index];
        $stmt_insert_experience = $conn->prepare("INSERT INTO experience(user_id, organization, position) VALUES (?, ?, ?)");
        $stmt_insert_experience->bind_param("iss", $user_id, $organization, $position);
        if (!$stmt_insert_experience->execute()) {
            echo "Error al insertar experiencia: " . $stmt_insert_experience->error;
        }
    }
}

    // Inserción en la tabla education
    if (isset($_POST['institution'])) {
        foreach ($_POST['institution'] as $index => $institution) {
            $career = $_POST['career'][$index];
            $stmt_insert_education = $conn->prepare("INSERT INTO education(user_id, institution, career) VALUES (?, ?, ?)");
            $stmt_insert_education->bind_param("iss", $user_id, $institution, $career);
            if (!$stmt_insert_education->execute()) {
                echo "Error al insertar educación: " . $stmt_insert_education->error;
            }
        }
    }

// Inserción en la tabla languages
if (isset($_POST['language'])) {
    foreach ($_POST['language'] as $index => $language) {
        $level = $_POST['level'][$index];
        $stmt_insert_languages = $conn->prepare("INSERT INTO languages(user_id, language, level) VALUES (?, ?, ?)");
        $stmt_insert_languages->bind_param("iss", $user_id, $language, $level);
        if (!$stmt_insert_languages->execute()) {
            echo "Error al insertar idiomas: " . $stmt_insert_languages->error;
        }
    }
}
// Inserción en la tabla skills
if (isset($_POST['skill'])) {
    foreach ($_POST['skill'] as $index => $skill) {
        $stmt_insert_skills = $conn->prepare("INSERT INTO skills(user_id, skill) VALUES (?, ?)");
        $stmt_insert_skills->bind_param("is", $user_id, $skill);
        if (!$stmt_insert_skills->execute()) {
            echo "Error al insertar habilidades: " . $stmt_insert_skills->error;
        }
    }
}

    // Redirigir al usuario
    header("Location: index.html");
    exit;
}
?>