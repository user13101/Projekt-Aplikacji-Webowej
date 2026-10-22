<?php
function fetchAll(PDO $pdo, string $sql): array {
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function fetchOne(PDO $pdo, string $sql, array $params = []): ?array {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch();
    return $result ?: null;
}

function esc(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
