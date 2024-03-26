<?php
function all_feedback()
{
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM feedback ORDER BY feedback.id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
function update_status($feedbackId) {
    $conn = pdo_get_connection();
    $sql = "UPDATE feedback SET status = 1 WHERE id = :feedbackId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':feedbackId', $feedbackId, PDO::PARAM_INT);
    $stmt->execute(); 
}
function feedback_one($fbid){
    $sql = "SELECT * FROM feedback WHERE id = :feedback_id";
    return pdo_query_one($sql, [':feedback_id' => $fbid]);
}
function delete_feedback($feedbackId) {
    $conn = pdo_get_connection();
    $sql = "DELETE FROM feedback WHERE id = :feedbackId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':feedbackId', $feedbackId, PDO::PARAM_INT);
    $stmt->execute();
}
?>