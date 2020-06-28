<?php
function stockB($title) {
    global $conn;
    global $fmt_table;
    global $fmt_row;
    global $fmt_tr;
    global $fmt_td;
    global $translate;
    global $relation;

    $classStock = $translate[$title];
    $classSubtr = $relation[$title];

    // stock 테이블의 모든 item
    $query = "SELECT DISTINCT stock.item, datalist.seq 
            FROM stock, datalist 
            WHERE stock.class = '$classStock'
            AND datalist.kind = 'item'
            AND datalist.name = stock.item 
            ORDER BY datalist.seq;";
    $items = mysqli_fetch_all(mysqli_query($conn, $query));

    // stock 테이블의 모든 deisgn
    $query = "SELECT DISTINCT stock.design, datalist.seq 
            FROM stock, datalist 
            WHERE stock.class = '$classStock'
            AND datalist.kind = 'design' 
            AND datalist.name = stock.design 
            ORDER BY datalist.seq;";
    $designs = mysqli_fetch_all(mysqli_query($conn, $query));

    $total = "";
    foreach ($designs as $j => $design) {
        $tr = "";
        $thead = "";
        foreach ($items as $i => $item) {
            if ($i == 0) {  // 테이블 헤더
                $cell = sprintf($fmt_td['attr'], 'th', "style='text-align: center'", $translate['design']);
                $cells_head = $cell;

                $cell = sprintf($fmt_td['attr'], 'th', "colspan='4' style='text-align: center'", $design[0]);
                $cells_head = $cells_head . $cell;

                $row1 = sprintf($fmt_tr, $cells_head);

                $cell = sprintf($fmt_td[true], 'th', "", $translate['item']);
                $cells_head = $cell;

                $cell = sprintf($fmt_td[true], 'th', "", '期初');
                $cells_head = $cells_head . $cell;

                $cell = sprintf($fmt_td[true], 'th', "", '入库');
                $cells_head = $cells_head . $cell;

                $cell = sprintf($fmt_td[true], 'th', "", '出库');
                $cells_head = $cells_head . $cell;

                $cell = sprintf($fmt_td[true], 'th', "", '现在库存');
                $cells_head = $cells_head . $cell;

                $row2 = sprintf($fmt_tr, $cells_head);
                $thead = sprintf($fmt_row, 'thead', 'none', $row1 . $row2);
            }

            $query = "SELECT qty FROM stock WHERE item='$item[0]' AND design='$design[0]' AND class='$classStock';"; // stock
            $stock = mysqli_fetch_array(mysqli_query($conn, $query))[0];
            $query = "SELECT sum(qty) FROM material WHERE item='$item[0]' AND design='$design[0]' AND class='$classStock';"; // material
            $material = mysqli_fetch_array(mysqli_query($conn, $query))[0];
            $query = "SELECT sum(qty) FROM material WHERE item='$item[0]' AND design='$design[0]' AND class='$classSubtr';"; // tiehua or chuku
            $subtract = mysqli_fetch_array(mysqli_query($conn, $query))[0];

            if ($stock == null && $material == null && $subtract == null) { continue; }

            $cell = sprintf($fmt_td[true], 'td', "", $item[0]); // 아이템 이름
            $cells_body = $cell;
            $cell = sprintf($fmt_td['attr'], 'td', "name='$title'; style='text-align: right'", $stock);
            $cells_body = $cells_body . $cell;
            $cell = sprintf($fmt_td['attr'], 'td', "name='$title'; style='text-align: right'", $material);
            $cells_body = $cells_body . $cell;
            $cell = sprintf($fmt_td['attr'], 'td', "name='$title'; style='text-align: right'", $subtract);
            $cells_body = $cells_body . $cell;

            $sum = intval($stock) + intval($material) - intval($subtract);
            $cell = sprintf($fmt_td['attr'], 'td', "name='$title'; style='text-align: right'", $sum);
            $cells_body = $cells_body . $cell;

            $tr = $tr . sprintf($fmt_tr, $cells_body);
        }

        $tbody = sprintf($fmt_row, 'tbody', 'none', $tr);
        $total = $total . $thead . $tbody;
    }

    $new_table = sprintf($fmt_table, $translate[$title].'库存', $total);
    echo "<script type='text/html' id='temp_page'>$new_table</script>";
}