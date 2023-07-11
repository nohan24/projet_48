<?php
session_start();
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        isLoggedAsAdmin();
    }

    public function index()
    {
        $data['title'] = "Tableau de bord";
        $data['diet'] = $this->Admin_model->getRegime();
        $data['content'] = "back_office/statistique";
        $this->load->view("back_office/body", $data);
    }

    public function regime($route)
    {
        if ($route == "ajout") {
            $data['activite'] = $this->Admin_model->getActivite();
            $data["plat"] = $this->Admin_model->getPlat();
            $data['title'] = "Ajout d'un régime.";
            $data['content'] = "back_office/ajout_regime";
            $this->load->view("back_office/body", $data);
        }

        if ($route == "plat") {
            $data["title"] = "Plat.";
            $data["param"] = $this->Admin_model->getParametre();
            $data["plat"] = $this->Admin_model->getPlat();
            $data['content'] = "back_office/plat";
            $this->load->view("back_office/body", $data);
        }

        if ($route == "liste") {
            $data['title'] = "Liste des régimes.";
            $data['regime'] = $this->Admin_model->getRegime();
            $data['content'] = "back_office/regime_liste";
            $this->load->view("back_office/body", $data);
        }
    }

    public function deleteDiet($id)
    {
        $this->Admin_model->deleteRegime($id);
        redirect(site_url("admin/regime/liste"));
    }

    public function ajoutRegime()
    {
        $this->Admin_model->addRegime($_POST);
        redirect(site_url("admin/regime/ajout"));
    }

    public function supprimerPlat($id)
    {
        $this->Admin_model->deleteFood($id);
        redirect(site_url("admin/regime/plat"));
    }

    public function insertPlat()
    {
        $this->Admin_model->addPlat($_POST);
        redirect(site_url("admin/regime/plat"));
    }

    public function activite($route, $id = null)
    {
        if ($route == "ajout") {
            $data['unite'] = $this->Admin_model->getUnite();
            $data['title'] = "Ajout d'une activité.";
            $data['content'] = "back_office/ajout_activite";
            $this->load->view("back_office/body", $data);
        }

        if ($route == "liste") {
            $data['activite'] = $this->Admin_model->getActivite();
            $data['title'] = "Liste des activités.";
            $data['content'] = "back_office/liste_activite";
            $this->load->view('back_office/body', $data);
        }

        if ($route == "modification") {
            $data['unite'] = $this->Admin_model->getUnite();
            $data['detail'] = $this->Admin_model->getDetail($id);
            $data['title'] = "Modification d'activité.";
            $data['act_id'] = $id;
            $data['content'] = "back_office/modification_activite";
            $this->load->view("back_office/body", $data);
        }
    }

    public function parametre()
    {

        $data['title'] = "Paramètres.";
        $data['parametre'] = $this->Admin_model->getParametre();
        $data['content'] = "back_office/parametre";
        $this->load->view("back_office/body", $data);
    }

    public function ajoutActivite()
    {
        $this->Admin_model->insert($_POST);
        redirect(site_url("admin/activite/ajout"));
    }

    public function delete($id)
    {
        $this->Admin_model->deleteActivite($id);
        redirect(site_url("admin/activite/liste"));
    }

    public function modificationActivite()
    {
        $this->Admin_model->updateActivite($_POST);
        redirect(site_url('admin/activite/modification/' . $_POST['id_act']));
    }

    public function insertParametre()
    {
        $this->Admin_model->insertParam($_POST);
        redirect(site_url("admin/parametre"));
    }

    public function deleteParametre($id)
    {
        $this->Admin_model->deleteParam($id);
        redirect(site_url("admin/parametre"));
    }

    public function modificationParametre()
    {
        $this->Admin_model->updateParam($_POST);
        redirect(site_url("admin/parametre"));
    }

    public function code()
    {
        $data['title'] = "Demande de validation.";
        $data['demande'] = $this->Admin_model->getDemande();
        $data['content'] = "back_office/monnaie";
        $this->load->view("back_office/body", $data);
    }

    public function acceptCode($code, $user, $montant)
    {
        $this->db->query("INSERT INTO usedCode VALUES($code)");
        $this->db->query("DELETE FROM requestedCode WHERE code_id = $code and user_id = $user");
        $this->db->query("UPDATE vola SET montant = montant + $montant WHERE user_id = $user");
        redirect(site_url("admin/code"));
    }

    public function declineCode($code, $user)
    {
        $this->db->query("DELETE FROM requestedCode WHERE code_id = $code and user_id = $user");
        redirect(site_url("admin/code"));
    }

    public function getData($diet)
    {
        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $sql = "SELECT coalesce(COUNT(diet_id),0) as qtt FROM historique_achat WHERE diet_id = $diet and EXTRACT(YEAR FROM date_achat)= extract(year from now()) and EXTRACT(MONTH FROM date_achat) = $i group by diet_id";
            $query = $this->db->query($sql);
            if ($query->row_array()['qtt'] == null) {
                array_push($result, 0);
            } else {
                array_push($result, doubleval($query->row_array()['qtt']));
            }
        }
        echo json_encode($result);
    }
}
