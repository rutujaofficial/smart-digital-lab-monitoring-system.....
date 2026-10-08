<?php
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

// Automatically connects using your db.php file!
require_once 'db.php';

// 1. Mark students as 'Inactive' if no heartbeat received in last 20 seconds
$conn->query("UPDATE students SET status = 'Inactive' WHERE TIMESTAMPDIFF(SECOND, last_seen, NOW()) > 20");

// 2. If the Student Portal is sending a live update (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if ($input && isset($input['roll_no'])) {
        $roll_no       = $input['roll_no'];
        $name          = $input['name'] ?? 'Student';
        $pc_no         = $input['pc_no'] ?? 'PC-01';
        $subject       = $input['subject'] ?? 'Python / PBL';
        $faculty       = $input['faculty'] ?? 'Prof. Sana A. Metkari';
        $status        = $input['status'] ?? 'Active';
        $active_window = $input['active_window'] ?? 'Student Portal';
        $alert_msg     = $input['alert_msg'] ?? 'None';

        $stmt = $conn->prepare("
            INSERT INTO students (roll_no, name, pc_no, subject, faculty, status, active_window, alert_msg, last_seen)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
            ON DUPLICATE KEY UPDATE
                name = VALUES(name),
                pc_no = VALUES(pc_no),
                subject = VALUES(subject),
                faculty = VALUES(faculty),
                status = VALUES(status),
                active_window = VALUES(active_window),
                alert_msg = VALUES(alert_msg),
                last_seen = NOW()
        ");

        $stmt->bind_param("ssssssss", $roll_no, $name, $pc_no, $subject, $faculty, $status, $active_window, $alert_msg);
        $stmt->execute();
        $stmt->close();

        echo json_encode(["success" => true, "message" => "Heartbeat updated"]);
        exit;
    }
}

// 3. If the Faculty Dashboard is requesting the live student list (GET request)
$result = $conn->query("SELECT * FROM students ORDER BY pc_no ASC");
$students = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

echo json_encode($students);
$conn->close();
?>