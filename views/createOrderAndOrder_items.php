<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/order.php';
require_once '../models/order_item.php';
require_once '../controllers/createOrderAndOrder_itemsCtrl.php';

include 'header.php';
include 'footer.php'
?>