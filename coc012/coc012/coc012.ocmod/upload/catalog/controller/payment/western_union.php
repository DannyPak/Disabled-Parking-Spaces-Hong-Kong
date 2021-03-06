<?php
class ControllerPaymentWesternUnion extends Controller {
	protected function index() {
		$this->language->load('payment/western_union');
		
		$this->data['text_instruction'] = $this->language->get('text_instruction');
		$this->data['text_payment'] = $this->language->get('text_payment');
		
		$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');
		
		$this->data['bank'] = nl2br($this->config->get('western_union_bank_' . $this->config->get('config_language_id')));

		$this->data['continue'] = HTTPS_SERVER . 'index.php?route=checkout/success';

		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = HTTPS_SERVER . 'index.php?route=checkout/payment';
		} else {
			$this->data['back'] = HTTPS_SERVER . 'index.php?route=checkout/guest_step_2';
		}
		
		$this->id = 'payment';

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/western_union.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/western_union.tpl';
		} else {
			$this->template = 'default/template/payment/western_union.tpl';
		}	
		
		$this->render(); 
	}
	
	public function confirm() {
		$this->language->load('payment/western_union');
		
		$this->load->model('checkout/order');
		
		$comment  = $this->language->get('text_instruction') . "\n\n";
		$comment .= $this->config->get('western_union_bank_' . $this->config->get('config_language_id')) . "\n\n";
		$comment .= $this->language->get('text_payment');
		
		$this->model_checkout_order->confirm($this->session->data['order_id'], $this->config->get('western_union_order_status_id'), $comment);
	}
}
?>