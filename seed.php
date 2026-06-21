<?php
require_once __DIR__ . '/config/db.php';

$categories_data = [
    ['Royal Beds', 'assets/img/bedroom_furniture/Luxury-Teak-Wood-Bed-with-Storage-scaled.webp'],
    ['Luxury Sofa Sets', 'assets/img/Sofa_Set_Design/10-Seater-Royal-Concept-Sofa-Set-YT-582.webp'],
    ['Dining Sets', 'assets/img/Dining_furniture/04-Seater-Royal-Dining-Table-Set-at-Factory-Price-1.webp'],
    ['Console Tables', 'assets/img/console_table/Baroque-Style-Console-Table-jpg.webp'],
    ['Accent Chairs', 'assets/img/gurujichair/Aarsun-Guruji-chair-jpg.webp'],
    ['Centre Tables', 'assets/img/console_table/Designer-Wooden-Console-B.jpg'],
    ['Royal Swings', 'assets/img/swing_design/Buy-a-strong-durable-and-long-lasting-wooden-swing.webp'],
    ['Ornate Mirrors', 'assets/img/partition_and_decorative/Antique-Style-Room-Divider-UH-PART-0087-jpg.webp'],
    ['Pooja Mandirs', 'assets/img/temple/08-Feet-Home-Temple-Design-2.webp'],
    ['Designer Doors', 'assets/img/door_Design/Cut-Work-Style-Door-Design.webp'],
    ['Partition Designs', 'assets/img/partition_and_decorative/Carved-Grapes-Pattern-Room-Divider-UH-PART-0084-jpg.webp'],
    ['Guruji Chair', 'assets/img/gurujichair/Aesthetic-Lion-Faced-Guru-Ji-Chair-1.webp'],
    ['Office Furniture', 'assets/img/Office_furniture/Chairmans-Luxurious-Office-Furniture-2-scaled.webp'],
    ['Study Tables', 'assets/img/console_table/French-Style-Royal-Console-Table-CNS-0024-A-jpg.webp']
];

$products_data = [
    'Royal Beds' => [
        ['Imperial King Bed', 'assets/img/bedroom_furniture/Premium-Bedroom-Set-with-Modern-Home-scaled.webp'],
        ['Crown Tufted Canopy Bed', 'assets/img/bedroom_furniture/Buy-Royal-Beds-Online-at-Best-Prices-side-drawers-scaled.webp']
    ],
    'Luxury Sofa Sets' => [
        ['Baroque Velvet Sofa Set', 'assets/img/Sofa_Set_Design/6-Seater-Glossy-Finish-Sofa-Set-YT-303.webp'],
        ['Chesterfield Royal Lounge', 'assets/img/Sofa_Set_Design/Classic-Rajwada-Sofa-Set-E.jpg']
    ],
    'Dining Sets' => [
        ['Grand Palace Dining Table', 'assets/img/Dining_furniture/Gold-Brown-Dual-Shade-4-Seater-Dining-Set-Custom-Made-scaled.webp'],
        ['Royal Teakwood Dining Ensemble', 'assets/img/Dining_furniture/04-Seater-Royal-Dining-Table-Set-at-Factory-Price-1.webp']
    ],
    'Console Tables' => [
        ['Baroque Gold Console Table', 'assets/img/console_table/Baroque-Style-Console-Table-jpg.webp'],
        ['French Entryway Console', 'assets/img/console_table/French-Style-Royal-Console-Table-CNS-0024-A-jpg.webp']
    ],
    'Accent Chairs' => [
        ['Royal Maharaja Accent Chair', 'assets/img/gurujichair/Aarsun-Guruji-chair-jpg.webp'],
        ['Gilded Teak Accent Chair', 'assets/img/gurujichair/Aarsun-Wooden-Guruji-Chair-with-Stool-in-Gold-Polish.webp']
    ],
    'Centre Tables' => [
        ['Classic Carved Centre Table', 'assets/img/console_table/Designer-Wooden-Console-B.jpg'],
        ['Solid Teak Salon Centre Table', 'assets/img/console_table/Wooden-Console.jpg']
    ],
    'Royal Swings' => [
        ['Royal Peacock Swing', 'assets/img/swing_design/Buy-a-strong-durable-and-long-lasting-wooden-swing.webp'],
        ['Indoor Carved Jhoola', 'assets/img/swing_design/Indoor-Carved-Kashmiri-Swing-D-jpg.webp']
    ],
    'Ornate Mirrors' => [
        ['Full Handcrafted Mirror Console', 'assets/img/console_table/Full-Handcrafted-Mirror-Console-Table-0.webp'],
        ['Grand Mirror Frame Console', 'assets/img/console_table/Grand-Console-with-Mirror-Frame-for-Home.jpg']
    ],
    'Pooja Mandirs' => [
        ['Palatial Home Mandir', 'assets/img/temple/08-Feet-Home-Temple-Design-2.webp'],
        ['Gilded Teakwood Devalayam', 'assets/img/temple/2026-Hindu-Puja-Mandir-Design-for-home.webp']
    ],
    'Designer Doors' => [
        ['Cut-Work Designer Door', 'assets/img/door_Design/Cut-Work-Style-Door-Design.webp'],
        ['Grand Classical Teak Door', 'assets/img/door_Design/Solid-Wood-Classical-Door-Design.webp']
    ],
    'Partition Designs' => [
        ['Classic Rajwada Partition', 'assets/img/partition_and_decorative/Classic-Room-Separator-in-Sheesham-Wood-PART-0092-jpg.webp'],
        ['Carved Grapes Room Divider', 'assets/img/partition_and_decorative/Carved-Grapes-Pattern-Room-Divider-UH-PART-0084-jpg.webp']
    ],
    'Guruji Chair' => [
        ['Lion-Faced Satsang Gaddi', 'assets/img/gurujichair/Aesthetic-Lion-Faced-Guru-Ji-Chair-1.webp'],
        ['Royal Satsang Singhasan', 'assets/img/gurujichair/Crafted-Royal-Chair-for-Guruji-Gaddi-Design-1-1.webp']
    ],
    'Office Furniture' => [
        ['Chairmans Luxurious Workspace', 'assets/img/Office_furniture/Chairmans-Luxurious-Office-Furniture-2-scaled.webp'],
        ['Designer Workspace Ensemble', 'assets/img/Office_furniture/Designer-Office-Workspace-Furniture-2-scaled.webp']
    ],
    'Study Tables' => [
        ['Regal Carved Study Table', 'assets/img/Office_furniture/Smart-Corporate-Workspace-Furniture-2-scaled.webp'],
        ['Executive Hand-Carved Desk', 'assets/img/Office_furniture/Upgrade-Your-Office-with-Stylish-Hand-carved-Furniture-1-scaled.webp']
    ]
];

// Helper to make slug
function make_slug($string) {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string))) . '-' . uniqid();
}

$pdo->beginTransaction();

try {
    foreach ($categories_data as $cat) {
        $name = $cat[0];
        $image = $cat[1];
        $slug = make_slug($name);
        
        // Check if category already exists to avoid duplicates
        $stmt = $pdo->prepare("SELECT id FROM categories WHERE name = ?");
        $stmt->execute([$name]);
        $existing = $stmt->fetch();
        
        if ($existing) {
            $cat_id = $existing['id'];
        } else {
            $stmt = $pdo->prepare("INSERT INTO categories (name, slug, cover_image) VALUES (?, ?, ?)");
            $stmt->execute([$name, $slug, $image]);
            $cat_id = $pdo->lastInsertId();
        }
        
        // Insert products for this category
        if (isset($products_data[$name])) {
            foreach ($products_data[$name] as $prod) {
                $p_name = $prod[0];
                $p_image = $prod[1];
                $p_slug = make_slug($p_name);
                
                // Check if product exists
                $stmt = $pdo->prepare("SELECT id FROM products WHERE name = ?");
                $stmt->execute([$p_name]);
                $existing_p = $stmt->fetch();
                
                if (!$existing_p) {
                    $stmt = $pdo->prepare("INSERT INTO products (category_id, name, slug, description) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$cat_id, $p_name, $p_slug, 'Exclusive luxury piece: ' . $p_name]);
                    $prod_id = $pdo->lastInsertId();
                    
                    // Insert product image
                    $stmt = $pdo->prepare("INSERT INTO product_images (product_id, image_path, is_primary) VALUES (?, ?, ?)");
                    $stmt->execute([$prod_id, $p_image, 1]);
                }
            }
        }
    }
    
    $pdo->commit();
    echo "Seed completed successfully!\n";
    
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage() . "\n";
}
?>
