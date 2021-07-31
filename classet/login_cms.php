<?php
include 'lib/session.php';
Session :: checkLogin_cms();
include 'lib/database_login.php';
include 'helper/format.php';
?>
<?php
    class admin_login {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }     
        public function login_cms($adminUser, $adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);
            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
            if(empty($adminUser) || empty($adminPass)){
                $alert = "Chưa điền đủ thông tin tài khoản, mật khẩu";
                return $alert;
            }else{
                $query = "SELECT * FROM khachhang WHERE Email = '$adminUser' AND MatKhau = '$adminPass' LIMIT 1";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('cus_login', true);
                    Session::set('checkout_login', true);
                    Session::set('id', $value['KhachHangID']);
                    Session::set('user', $value['Email']);
                    Session::set('name', $value['HoVaTen']);
                    header('Location:index.php');
                }else{
                    $alert = "Tên tài khoản hoặc mật khẩu chưa chính xác";
                    return $alert;
                }
            }
        }
    }
?> 