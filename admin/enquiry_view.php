<?php
require_once 'includes/header.php';

if (!isset($_GET['id'])) {
    header("Location: enquiries.php");
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("
    SELECT e.*, p.name as product_name 
    FROM enquiries e 
    LEFT JOIN products p ON e.product_id = p.id 
    WHERE e.id = ?
");
$stmt->execute([$id]);
$enq = $stmt->fetch();

if (!$enq) {
    header("Location: enquiries.php");
    exit();
}

// Mark as read when viewed
if ($enq['status'] == 'new') {
    $pdo->prepare("UPDATE enquiries SET status = 'read' WHERE id = ?")->execute([$id]);
}
?>

<div class="page-header">
    <h1>Enquiry Details</h1>
    <a href="enquiries.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card" style="max-width: 700px;">
    <div class="card-body">
        
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px;">
            <div>
                <h2 style="font-size: 20px; color: var(--dark); margin-bottom: 5px;"><?= htmlspecialchars($enq['name']) ?></h2>
                <div style="color: var(--text-muted); font-size: 13px;">
                    <i class="fa-regular fa-clock"></i> Received on <?= date('F j, Y \a\t g:i A', strtotime($enq['created_at'])) ?>
                </div>
            </div>
            <div>
                <span class="badge <?= $enq['status'] == 'new' ? 'badge-warning' : 'badge-success' ?>">
                    <?= strtoupper($enq['status']) ?>
                </span>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; background: #f9f9f9; padding: 20px; border-radius: 8px; border: 1px solid var(--border-color);">
            <div>
                <div style="color: var(--text-muted); font-size: 12px; text-transform: uppercase; font-weight: 600; margin-bottom: 5px;">Phone Number</div>
                <div style="color: var(--dark); font-weight: 500;"><i class="fa-solid fa-phone" style="color: var(--primary); margin-right: 5px;"></i> <?= htmlspecialchars($enq['phone']) ?></div>
            </div>
            <div>
                <div style="color: var(--text-muted); font-size: 12px; text-transform: uppercase; font-weight: 600; margin-bottom: 5px;">Email Address</div>
                <div style="color: var(--dark); font-weight: 500;"><i class="fa-solid fa-envelope" style="color: var(--primary); margin-right: 5px;"></i> <?= htmlspecialchars($enq['email'] ?? 'Not provided') ?></div>
            </div>
            <div style="grid-column: 1 / -1;">
                <div style="color: var(--text-muted); font-size: 12px; text-transform: uppercase; font-weight: 600; margin-bottom: 5px;">Interested Product</div>
                <?php if ($enq['product_name']): ?>
                    <div style="color: var(--info); font-weight: 600;"><i class="fa-solid fa-couch" style="margin-right: 5px;"></i> <?= htmlspecialchars($enq['product_name']) ?></div>
                <?php else: ?>
                    <div style="color: var(--dark); font-weight: 500;">General Enquiry</div>
                <?php endif; ?>
            </div>
        </div>

        <div style="color: var(--text-muted); font-size: 12px; text-transform: uppercase; font-weight: 600; margin-bottom: 10px;">Message</div>
        <div style="background: white; padding: 20px; border-radius: 8px; border: 1px solid var(--border-color); color: var(--text-main); line-height: 1.6;">
            <?= nl2br(htmlspecialchars($enq['message'])) ?>
        </div>
        
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
