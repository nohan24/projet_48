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
        // $this->load->view("back_office/body", $data);
        echo "board";
    }

    public function regime($route)
    {
        if ($route == "ajout") {
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
}
