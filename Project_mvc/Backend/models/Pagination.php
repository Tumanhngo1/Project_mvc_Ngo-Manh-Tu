<?php
class Pagination2{
    public $params = [
        'limit' => 0,
        'total' =>'',
        'controller'=>'',
        'action' =>'',
        'full_mode' => false
    ];
    public function __construct($params){
        $this->params = $params;
    }
    //lấy tổng số trang
    public function getTotalPage(){
        $total = ceil($this->params['total']/$this->params['limit']);
        return $total;
    }
    //lấy ra số trang hiện tại
    public function getCurrentPage(){
        $page = 1;
        if(isset($_GET['page'])&& is_numeric($_GET['page'])){
            $page = $_GET['page'];
            $total_page=$this->getTotalPage();
            if($page >= $total_page){
                $page = $total_page;
            } 
        }
        return $page;
    }
    //tạo prev page
    public function getPrevPage(){
        $prev_page = '';
        $currentPage = $this->getCurrentPage();
        if ($currentPage >= 2) {
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $page = $currentPage -1;
            $url = "index.php?controller=$controller&action=$action&page=$page";
            $prev_page = "
            <li class='page-item'>
            <a class='page-link'href='$url' aria-label='Previous'>
                <span aria-hidden='true'>&laquo;</span>
                <span class='sr-only'>Previous</span>
            </a>
            </li>
            ";
        }
        return $prev_page;
    }
    //tạo link next 
    public function getNextPage(){
        $next_page = '';
        $currentPage = $this->getCurrentPage();
        $totalPage = $this->getTotalPage();
        if ($currentPage < $totalPage) {
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $page = $currentPage + 1;
            $url = "index.php?controller=$controller&action=$action&page=$page";
            $next_page ="
            <li class='page-item'>
             <a class='page-link' href='$url' aria-label='Next'>
                 <span aria-hidden='true'>&raquo;</span>
                 <span class='sr-only'>Next</span>
             </a>
             </li>
            ";
        }
        return $next_page;
    }
    // xây dựng phương thức hoàn chỉnh
    public function getPagination(){
        $data = '';
        //nếu tổng số trang = 1 thì k cần hiện phân trang
        $totalPage = $this->getTotalPage();
        if ($totalPage == 1) {
            return '';
        }
        // gắn link prev
        $data.="<ul class='pagination'>";
        $prav = $this->getPrevPage();
        $data.=$prav;
        //tạo biến
        $controller = $this->params['controller'];
        $action = $this->params['action'];
        //nếu như full_mode = false thì
        if($this->params['full_mode']==false){
            for($page = 1; $page <= $totalPage; $page++){
                $currentPage = $this->getCurrentPage();
                if ($page == 1 || $page == $totalPage || $page == $currentPage - 1 || $page == $currentPage +1) {
                    $url = "index.php?controller=$controller&action=$action&page=$page";
                    $data .= "<li class='page-item'><a class='page-link' href='$url'>$page</a></li>";
                }
                elseif($page == $currentPage){
                    $data .="<li class='page-item' ><a class='page-link' href=''>$page</a></li>";
                }
                elseif(in_array($page,[$currentPage - 2,$currentPage +2]) ){
                    $data .= "<li class='page-item' ><a class='page-link' href=''>...</a></li>";
                }

            }
        }  //chạy vòng lặp từ 1 đến tổng số trang
        //để hiển t
        else{
            for ($page =1; $page <= $totalPage; $page++) { 
                $currentPage = $this->getCurrentPage();
                if ($page == $currentPage) {
                    $data .= "<li class='page-item'><a  class='page-link href='#'>$page</a></li>";
                }else{
                    $url = "index.php?controller=$controller&action=$action&page=$page";
                    $data .= "<li class='page-item'><a  class='page-link href='$url'>$page</a></li>";
                }
            } 

        }
         //gắn link next
      $next = $this->getNextPage();
      $data .= $next;
      $data .= "</ul>";
      return $data;

    } 
}