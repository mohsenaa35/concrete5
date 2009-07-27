<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));
class DashboardPagesThemesAddController extends Controller {

	protected $helpers = array('html');

	public function view($arg = null) {
		
		$v = Loader::helper('validation/error');
		Loader::model('page_theme_archive');
		
		if ($arg == 'install') {
			try {
				$pl = new PageThemeArchive();
				$t = $pl->install($_FILES['archive']['tmp_name']);
				$this->redirect('/dashboard/pages/themes/inspect', $t->getThemeID(), 1);
				
			} catch (Exception $e) {
				$v->add($e);
			}
		}		
		if ($v->has()) {
			$this->set('error', $v);
		}
		$this->set('addurl', View::url('/dashboard/pages/themes/add', 'install'));
	}


}

?>