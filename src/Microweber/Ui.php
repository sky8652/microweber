<?php
namespace Microweber;
class Ui
{


    public $admin_menu = array();
    public $create_content_menu = array(
        "post" => "Post",
        "page" => "Page",
        "category" => "Category"
    );
    public $admin_dashboard_menu = array();
    public $admin_dashboard_menu_second = array();
    public $admin_dashboard_menu_third = array();
    public $custom_fields = array();
    public $admin_logo = '';
    public $admin_logo_login = '';
    public $logo_live_edit = '';
    public $brand_name = 'Microweber';
    public $powered_by_link = false;
    public $admin_content_edit = array();
    public $admin_content_edit_text = array();

    function __construct()
    {

        $this->admin_logo = MW_INCLUDES_URL . 'img/logo_admin.png';
        $this->logo_live_edit = MW_INCLUDES_URL . 'img/logo_admin.png';
        $this->admin_logo_login = MW_INCLUDES_URL . 'images/logo-login.svg';

        $this->set_default();


    }
    public function set_admin_menus()
    {
        $btn = array();
        $btn['content_type'] = 'page';
        $btn['title'] = _e("Page", true);
        $btn['class'] = 'mw-icon-page';
        mw()->module->ui('module.content.create.menu', $btn);

        $btn = array();
        $btn['content_type'] = 'post';
        $btn['title'] = _e("Post", true);
        $btn['class'] = 'mw-icon-post';
        mw()->module->ui('module.content.create.menu', $btn);

        $btn = array();
        $btn['content_type'] = 'category';
        $btn['title'] = _e("Category", true);
        $btn['class'] = 'mw-icon-category';
        mw()->module->ui('module.content.create.menu', $btn);
    }
    function set_default()
    {

        $fields = array(
            "text" => "Text Field",
            "number" => "Number",
            "price" => "Price",
            "phone" => "Phone",
            "site" => "Web Site",
            "email" => "E-mail",
            "address" => "Address",
            "date" => "Date",
            "upload" => "File Upload",
            "radio" => "Single Choice",
            "dropdown" => "Dropdown",
            "checkbox" => "Multiple choices"
        );

        $this->custom_fields = $fields;








        if (defined('MW_BACKEND')) {
            $notif_count = mw('Microweber\Notifications')->get('is_read=n&count=1');
            $notif_count_html = false;
            if (intval($notif_count) > 0) {
                $notif_count_html = '<sup class="mw-notification-count">' . $notif_count . '</sup>';
            }
            $admin_dashboard_btn = array();
            $admin_dashboard_btn['view'] = 'admin__notifications';
            $admin_dashboard_btn['text'] = _e("Notifications", true) . $notif_count_html;
            $admin_dashboard_btn['icon_class'] = 'mw-icon-notification';
            $this->admin_dashboard_menu($admin_dashboard_btn);


            $admin_dashboard_btn = array();
            $admin_dashboard_btn['view'] = 'content';
            $admin_dashboard_btn['text'] = _e("Manage Website", true);
            $admin_dashboard_btn['icon_class'] = 'mw-icon-website';
            $this->admin_dashboard_menu_second($admin_dashboard_btn);

            $admin_dashboard_btn = array();
            $admin_dashboard_btn['view'] = 'modules';
            $admin_dashboard_btn['text'] = _e("Manage Modules", true);
            $admin_dashboard_btn['icon_class'] = 'mw-icon-module';
            $this->admin_dashboard_menu_second($admin_dashboard_btn);

            $admin_dashboard_btn = array();
            $admin_dashboard_btn['view'] = 'files';
            $admin_dashboard_btn['text'] = _e("File Manager", true);
            $admin_dashboard_btn['icon_class'] = 'mw-icon-upload';
            $this->admin_dashboard_menu_second($admin_dashboard_btn);


            $admin_dashboard_btn = array();
            $admin_dashboard_btn['view'] = 'upgrades';
            $admin_dashboard_btn['text'] = _e("Upgrades", true);
            $admin_dashboard_btn['icon_class'] = 'mw-icon-market';
            $this->admin_dashboard_menu_third($admin_dashboard_btn);


            $notif_count = mw_updates_count();
            $notif_count_html = false;
            if (intval($notif_count) > 0) {
                $notif_count_html = '<sup class="mw-notification-count">' . $notif_count . '</sup>';
            }
            $admin_dashboard_btn = array();
            $admin_dashboard_btn['view'] = 'updates';
            $admin_dashboard_btn['text'] = _e("Updates", true) . $notif_count_html;
            $admin_dashboard_btn['icon_class'] = 'mw-icon-updates';
            $this->admin_dashboard_menu_third($admin_dashboard_btn);


            $admin_dashboard_btn = array();
            $admin_dashboard_btn['link'] = 'https://microweber.com/contact-us';
            $admin_dashboard_btn['text'] = _e("Suggest a feature", true);
            $admin_dashboard_btn['icon_class'] = 'mw-icon-suggest';
            $this->admin_dashboard_menu_third($admin_dashboard_btn);
        }

    }

    function admin_dashboard_menu($arr = false)
    {

        if ($arr != false) {
            array_push($this->admin_dashboard_menu, $arr);
        }
        return $this->admin_dashboard_menu;
    }

    function admin_dashboard_menu_second($arr = false)
    {

        if ($arr != false) {
            array_push($this->admin_dashboard_menu_second, $arr);
        }
        return $this->admin_dashboard_menu_second;
    }

    function admin_dashboard_menu_third($arr = false)
    {

        if ($arr != false) {
            array_push($this->admin_dashboard_menu_third, $arr);
        }
        return $this->admin_dashboard_menu_third;
    }

    public function admin($menu_array)
    {


    }

    public function brand_name()
    {
        return $this->brand_name;
    }

    public function live_edit_logo()
    {
        return $this->logo_live_edit;
    }

    public function admin_logo_login()
    {
        return $this->admin_logo_login;
    }

    public function admin_logo()
    {
        return $this->admin_logo;
    }

    public function admin_menu()
    {
        return $this->admin_menu;
    }

    function add_admin_menu($arr)
    {
        if ($arr != false) {
            $this->admin_menu = array_merge($this->admin_menu, $arr);
        }

        return $this->admin_menu;
    }

    function admin_content_edit($arr = false)
    {
        if ($arr != false) {
            array_push($this->admin_content_edit, $arr);
        }
        return $this->admin_content_edit;
    }

    function admin_content_edit_text($arr = false)
    {
        if ($arr != false) {
            array_push($this->admin_content_edit_text, $arr);
        }
        return $this->admin_content_edit_text;
    }

    function create_content_menu()
    {
        return $this->create_content_menu;
    }



    function custom_fields()
    {
        return $this->custom_fields;
    }

    function add_custom_field($arr)
    {
        $this->custom_fields = array_merge($this->custom_fields, $arr);
        return $this->custom_fields;
    }

    function powered_by_link()
    {
        $link = '<a href="https://microweber.com/" title="Create free Website &amp; Online Shop">Create Website</a> with <a href="https://microweber.com" target="_blank" title="Microweber CMS">Microweber</a>';
        if ($this->powered_by_link != false) {
            $link = $this->powered_by_link;
        }
        return $link;
    }

}