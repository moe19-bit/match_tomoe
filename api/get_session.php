<?php
session_start();

echo json_encode(['session_data' => $_SESSION]);
