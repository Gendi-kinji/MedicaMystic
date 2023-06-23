<?php
class PageView {
    public static function Pagination($totalItems, $itemsPerPage = 10, $currentPage) {
        $totalPages = ceil($totalItems / $itemsPerPage);
        $startPage = max(1, $currentPage - 2);
        $endPage = min($totalPages, $currentPage + 2);
        return range($startPage, $endPage);
    }
}
?>