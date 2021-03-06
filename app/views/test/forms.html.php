<?php
render ( array( 'partial' => 'header', 'locals' => array( 'title' => $title ) ) );
?>

<h2 class="center">Test Form</h2>
<div style="margin:auto; width: 500px;">
	<?php
	$groups = array(array('CSE', 'cse'), array('ECE', 'ece'), array('IT', 'it', 'checked'), array('ICT', 'ict'), array('Vocational', 'voc'), array('Others', 'others'));
	$gender = array(array('Male', 'm'), array('Female', 'f'));
	$courses = array(array('C++', 'cpp'), array('Java', 'java', 'checked'), array('PHP', 'php'));

	$form = new Form('Model');
	echo $form->form_tag(array( 'url' => test_path ));
		echo $form->input('first_name', array( 'placeholder' => 'Fill First Name' ));
		echo $form->input('last_name', array( 'placeholder' => 'Fill Last Name' ));
		echo $form->input('pass', array( 'as' => 'password', 'placeholder' => 'Password' ));
		echo $form->input('uid', array( 'as' => 'hidden', 'value' => '324368493' ));
		echo $form->input('about', array( 'as' => 'textarea', 'placeholder' => 'Fill Last Name', 'label' => 'About you' ));
		echo $form->input('gender', array( 'as' => 'select', 'prompt' => 'Select Gender', 'collection' => $gender ));
		echo $form->input('group', array( 'as' => 'radio', 'collection' => $groups ));
		echo $form->input('courses', array( 'as' => 'checkbox', 'collection' => $courses, 'stacked' => 'true' ));

		echo $form->format( $form->reset(array('value' => 'Refresh')), $form->submit(array('value' => 'Save', 'class' => 'btn')) );		
	echo $form->end_form();
	?>
</div>