<?php

function create_mail($data) {
  $name = sanitize_text_field($data['full_name']);
  $mail = sanitize_text_field($data['mail']);
  $phone = sanitize_text_field($data['phone']);
  $message = sanitize_text_field($data['message']);

  if(empty($name) || empty($mail) || empty($phone) || empty($message)) {
    return false;
  }

  $to = get_option('admin_email');
  $subject = $data['type'] === 'presentation' ? 'Forespørgsel på fremvisning fra ' . $name : 'Ny besked fra ' . $name;
  $headers[] = 'From: Mobilhouse <' . get_option('admin_email') . '>';
  $headers[] = 'Content-type: text/html; charset=utf-8';
  $body = '<html><head>';
  $body .= '</head><body>';
  $body .= '<h4>Ny besked</h4>';
  $body .= '<p>Navn: ' . $name . '</p>';
  $body .= '<p>Telefonnummer: ' . $phone . '</p>';
  $body .= '<p>Mailadresse: ' . $mail . '</p>';
  $body .= '<p>Besked: ' . $message . '</p>';
  if($data['type'] === 'presentation') {
    $body .= '<p>Denne forespørgsel blev sendt fra siden ' . get_the_title() . ' ('. get_the_permalink() .')'.'</p>';
  }
  $body .= '</></html>';
  
  $mail_sent = wp_mail( $to, $subject, $body, $headers );

  if($data['type'] === 'presentation' && $mail_sent) {
    component('presentation-modal', [
      'complete' => true
    ]);
  }

  return $mail_sent;
}