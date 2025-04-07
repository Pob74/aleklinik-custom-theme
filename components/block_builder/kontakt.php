<?php
// Initialize form variables
$name = $email = $phone = $message = $subject = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    
    $errors = array();
    
    // Validation
    if (empty($name)) {
        $errors[] = 'Namn är obligatoriskt';
    }
    if (empty($email) || !is_email($email)) {
        $errors[] = 'Vänligen ange en giltig e-postadress';
    }
    if (empty($message)) {
        $errors[] = 'Meddelande är obligatoriskt';
    }
    
    if (empty($errors)) {
        // Get contact email from ACF options
        $to = get_field('contact_form_email', 'option');
        
        if (!$to) {
            $errors[] = 'Kontaktformuläret är inte korrekt konfigurerat. Vänligen kontakta kliniken direkt.';
        } else {
            // Email content
            $email_content = "
                Nytt meddelande från kontaktformuläret
                
                Namn: {$name}
                E-post: {$email}
                Telefon: {$phone}
                Ämne: {$subject}
                
                Meddelande:
                {$message}
            ";
            
            $headers = array(
                'From: ' . $name . ' <' . $email . '>',
                'Reply-To: ' . $email
            );
            
            $mail_sent = wp_mail($to, 'Nytt meddelande från kontaktformuläret', $email_content, $headers);
            
            if ($mail_sent) {
                $success_message = 'Tack för ditt meddelande! Vi återkommer så snart som möjligt.';
                // Clear form data after successful submission
                $name = $email = $phone = $message = $subject = '';
            } else {
                $errors[] = 'Ett fel uppstod när meddelandet skulle skickas. Vänligen försök igen senare.';
            }
        }
    }
}
?>

<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Kontakta oss</h2>
            
            <?php if (!empty($errors)): ?>
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">
                                <?php foreach ($errors as $error): ?>
                                    <?php echo esc_html($error); ?><br>
                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if (isset($success_message)): ?>
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700"><?php echo esc_html($success_message); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <form method="post" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_name" class="block text-sm font-medium text-gray-700 mb-1">Namn *</label>
                        <input type="text" id="contact_name" name="contact_name" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                               value="<?php echo esc_attr($name); ?>">
                    </div>
                    
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1">E-post *</label>
                        <input type="email" id="contact_email" name="contact_email" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                               value="<?php echo esc_attr($email); ?>">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                        <input type="tel" id="contact_phone" name="contact_phone"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                               value="<?php echo esc_attr($phone); ?>">
                    </div>
                    
                    <div>
                        <label for="contact_subject" class="block text-sm font-medium text-gray-700 mb-1">Ämne</label>
                        <input type="text" id="contact_subject" name="contact_subject"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                               value="<?php echo esc_attr($subject); ?>">
                    </div>
                </div>
                
                <div>
                    <label for="contact_message" class="block text-sm font-medium text-gray-700 mb-1">Meddelande *</label>
                    <textarea id="contact_message" name="contact_message" rows="6" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"><?php echo esc_textarea($message); ?></textarea>
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" name="contact_submit"
                            class="px-8 py-3 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                        Skicka meddelande
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
