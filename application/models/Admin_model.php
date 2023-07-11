<?php
class Admin_model extends CI_Model
{
    public function insert($data)
    {
        $sql1 = "INSERT INTO activite VALUES(default, %s)";
        $this->db->query(sprintf($sql1, $this->db->escape($data['nom'])));
        $seq = $this->db->query("select LAST_INSERT_ID() as last")->row_array()['last'];
        for ($i = 1; $i <= $data['n_activity']; $i++) {
            $sql2 = "INSERT INTO detail_activite VALUES(default, %s, %s, %s, %s)";
            $this->db->query(sprintf($sql2, $seq, $data['unite' . $i], $this->db->escape($data['nom' . $i]), $data['freq' . $i]));
        }
    }

    public function getUnite()
    {
        $this->db->select("*");
        $this->db->from("unite_activite");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function getActiviteName($id)
    {
        $this->db->select("activite_name");
        $this->db->from("v_activie_dispo");
        $this->db->where("activite_id", $id);
        $res = $this->db->get();
        return $res->row_array()['activite_name'];
    }

    public function getActivite()
    {
        $this->db->select("*");
        $this->db->from("v_activie_dispo");
        $res = $this->db->get();
        return $res->result_array();
    }

    public function deleteActivite($id)
    {
        $this->db->query("INSERT INTO activite_non_dispo VALUES(default,$id)");
    }

    public function getDetail($id)
    {
        $this->db->select("*");
        $this->db->from("v_detail");
        $this->db->where("activite_id", $id);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function updateActivite($data)
    {
        $sql1 = "UPDATE activite SET activite_name = %s WHERE activite_id = %s";
        $this->db->query(sprintf($sql1, $this->db->escape($data['act_name']), $data['id_act']));
        for ($i = 1; $i < $data['num_hidden']; $i++) {
            $sql2 = "UPDATE detail_activite SET unite_activite_id = %s, detail_name = %s, rep = %s";
            $this->db->query(sprintf($sql2, $data['unite' . $i], $this->db->escape($data['nom' . $i]), $data['freq' . $i]));
        }
    }

    public function getParametre($id = "")
    {
        if ($id == "") {
            $this->db->select("*");
            $this->db->from("v_parametre");
            return $this->db->get()->result_array();
        } else {
            $this->db->select("*");
            $this->db->from("v_parametre");
            $this->db->where("id", $id);
            return $this->db->get()->row_array();
        }
    }

    public function insertParam($data)
    {
        $sql = "INSERT INTO parametre VALUES(default,%s)";
        $this->db->query(sprintf($sql, $this->db->escape($data['param_name'])));
    }

    public function deleteParam($id)
    {
        $sql = "INSERT INTO parametre_non_dispo VALUES(default, %s)";
        $this->db->query(sprintf($sql, $id));
    }

    public function updateParam($data)
    {
        $sql = "UPDATE parametre SET name = %s where id = %s";
        $this->db->query(sprintf($sql, $this->db->escape($data['param']), $data['param_id']));
    }

    public function addPlat($data)
    {
        $sql = "INSERT INTO food VALUES(default, %s)";
        $this->db->query(sprintf($sql, $this->db->escape($data['plat'])));
        $restrictions = $data['restriction'] == null ? [] :  $data['restriction'];
        for ($i = 0; $i < count($restrictions); $i++) {
            $this->db->query("INSERT INTO restriction VALUES(last_insert_id(), " . $restrictions[$i] . ")");
        }
        redirect(site_url("admin/regime/plat"));
    }

    public function getPlat()
    {
        $this->db->select("*");
        $this->db->from("v_food_dispo");
        return $this->db->get()->result_array();
    }

    public function deleteFood($id)
    {
        $this->db->query("INSERT INTO food_non_dispo VALUES($id)");
    }

    public function deleteRegime($id)
    {
        $this->db->query("INSERT INTO diet_non_dispo VALUES(default, $id)");
    }

    public function getRegime()
    {
        $this->db->select("*");
        $this->db->from("v_diet_dispo");
        return $this->db->get()->result_array();
    }

    public function addRegime($data)
    {
        $target_dir = "assets/images/regime/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["img"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        if ($_FILES['img']['name'] == "") {
            $img = "default-img.jpg";
        } else {
            $img = $_FILES['img']['name'];
        }

        $sql = "INSERT INTO diet VALUES(default, %s, %s, %s, %s, %s, %s, %s, %s, %s)";
        $this->db->query(sprintf($sql, $this->db->escape($data['nom']), $data['genre'], $data['poids'], $data['objectif'], $data['prix'], $data['viande'], $data['poisson'], $data['volaille'], $this->db->escape($img)));
        if (isset($data['activite'])) {
            for ($i = 0; $i < count($data['activite']); $i++) {
                $this->db->query("INSERT INTO listActivite VALUES(last_insert_id(), " . $data['activite'][$i] . ")");
            }
        }

        if (isset($data['plat'])) {
            for ($i = 0; $i < count($data['plat']); $i++) {
                $this->db->query("INSERT INTO listfood VALUES(last_insert_id(), " . $data['plat'][$i] . ")");
            }
        }
    }
}
