<?php
require_once 'includes/header.php';

// Handle status update
if (isset($_GET['mark_read'])) {
    $stmt = $pdo->prepare("UPDATE enquiries SET status = 'read' WHERE id = ?");
    $stmt->execute([$_GET['mark_read']]);
    header("Location: enquiries.php");
    exit();
}

$stmt = $pdo->query("
    SELECT e.*, p.name as product_name 
    FROM enquiries e 
    LEFT JOIN products p ON e.product_id = p.id 
    ORDER BY e.created_at DESC
");
$enquiries = $stmt->fetchAll();
?>

<div class="page-header">
    <h1>Customer Enquiries</h1>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Contact Info</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquiries as $enq): ?>
                <tr style="<?= $enq['status'] == 'new' ? 'background-color: rgba(255, 199, 0, 0.05);' : '' ?>">
                    <td style="color: var(--text-muted); font-size: 13px;">
                        <i class="fa-regular fa-clock"></i> <?= date('d M Y, H:i', strtotime($enq['created_at'])) ?>
                    </td>
                    <td style="font-weight: <?= $enq['status'] == 'new' ? '700' : '500' ?>; color: var(--dark);">
                        <?= htmlspecialchars($enq['name']) ?>
                    </td>
                    <td>
                        <div style="font-size: 13px;"><i class="fa-solid fa-phone" style="color: var(--text-muted); font-size: 11px;"></i> <?= htmlspecialchars($enq['phone']) ?></div>
                        <div style="font-size: 13px; color: var(--text-muted);"><i class="fa-regular fa-envelope" style="font-size: 11px;"></i> <?= htmlspecialchars($enq['email'] ?? 'N/A') ?></div>
                    </td>
                    <td>
                        <?php if ($enq['product_name']): ?>
                            <span class="badge badge-success" style="background: rgba(114, 57, 234, 0.1); color: var(--info);"><?= htmlspecialchars($enq['product_name']) ?></span>
                        <?php else: ?>
                            <span style="color: var(--text-muted); font-size: 13px;">General Enquiry</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($enq['status'] == 'new'): ?>
                            <span class="badge badge-warning"><i class="fa-solid fa-circle-exclamation"></i> NEW</span>
                        <?php else: ?>
                            <span class="badge badge-success"><i class="fa-solid fa-check-double"></i> READ</span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: right;">
                        <a href="enquiry_view.php?id=<?= $enq['id'] ?>" class="btn btn-light"><i class="fa-regular fa-eye"></i> View</a>
                        <?php if ($enq['status'] == 'new'): ?>
                            <a href="?mark_read=<?= $enq['id'] ?>" class="btn btn-primary" style="margin-left: 5px;"><i class="fa-solid fa-check"></i> Mark Read</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($enquiries)): ?>
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 30px;">No enquiries received yet.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
