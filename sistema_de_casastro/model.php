<?php

Class Model {

    private $server = "localhost";
    private $username = "root";
    private $pass = "";
    private $db = "aula_sistema_cadastro";
    private $conn;

    public function __construct() {
        try {
            $this->conn =  new mysqli($this->server, $this->username, $this->pass, $this->db);
        }   catch (Exception $err) {
                 echo "A Conexão falhou!! " .$err->getMessage();
            }
    }
        public function insert() {
            if (isset($_POST['submit'])) {	
                echo "Cadastro realizado com sucesso!";
                if(isset($_POST['name']) && !isset($_POST['email']) && !isset($_POST['whatsapp']) && !isset($_POST['endereco'])) {
                    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['whatsapp']) && !empty($_POST['endereco'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $whats = $_POST['whatsapp'];
                    $address = $_POST['endereco'];
                    } else {
                        echo "<script>alert('Vazio')</script>";
                    }
                } 

                $query = "INSERT INTO cadastros (name, email, whatsapp, endereco) VALUES ('$name', '$email', '$whats', '$address')";
                if ($sql = $this->conn->query($query)) {
                    echo "<script>alert('Dados inseridos com sucessp!')</script>";
                    echo "<script>window.location.hreft'index.php'</script>";
                } else {
                    echo "<script>alert('Ocorreu um erro')</script>";
                    echo "<script>window.location.hreft'index.php'</script>";
                } 
            }   else{
                        echo "<script>alert('Preencha os campos!')</script>";
                        echo "<script>window.location.hreft'index.php'</script>";
                    }
        }
        public function fetch() {
            $data = null;
            $query = "SELECT * FROM cadastros";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        public function delete($id){
            $query = "DELETE FROM cadastros WHERE id = $id";
            if ($sql = $this->conn->query($query)) {
               return true;
            } else {
                return false;
            }
        }
    
        public function fetch_unico($id) {
            $data = null;
            $query = "SELECT * FROM cadastros WHERE id = $id";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        
        public function edit($id){
            $data = null;
            $query = "SELECT * FROM cadastros WHERE id = $id";
            if ($sql = $this->conn->query($query)) {
                while ($row = $sql->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        public function update ($data){
            $query = "UPDATE cadastros SET name = '$data[name]', email = '$data[email]', whatsapp = '$data[whatsapp]', endereco = '$data[endereco]' WHERE id = $data[id]";
            if ($sql = $this->conn->query($query)) {
               return true;
            } else {
                return false;
            }
        }
}

?>