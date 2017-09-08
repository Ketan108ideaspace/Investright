<?php 
/*
Template Name: New Quiz Landing Page
*/
get_header();
?><head>
<meta charset="utf-8">
<title>Take the Quiz</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<!-- Additional Stylesheet for Quiz page -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/take-the-quiz.css" rel="stylesheet" type="text/css">
</head>

<div class="main-wrapper">
<div class="container-innerpage full-width">
    <div class="row">
      <article class="content-wrap">
        <div class="editor-content">
        <div class="quiz-home-wrap quiz-march">
        <div class="grn-gred-box">
        <div class="grn-gred-bg">
			<a class="quiz-button" href="<?php the_field('take_quiz_link');?>"><?php the_field('button_title');?></a>
			<?php
				$nvQuiz = apply_filters('the_excerpt', the_field('take_quiz_text')); 
				echo $nvQuiz;
			?>
        </div>
        </div>
        <img src="<?php the_field('background_image');?>" alt="" class="quiz-home-bg">
        <img src="<?php the_field('background_image_mobile');?>" alt="" class="quiz-home-bg-mobile">
        </div>
        </div>
      </article>
    </div>
  </div>
 </div> 
<?php get_footer(); ?>