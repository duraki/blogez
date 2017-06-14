<?php
/**
 * @author      Halis Duraki <halis_duraki@outlook.com>
 * @package     Blogez <https://github.com/blogez>
 * 
 * @description 
 * The simplest static site generator / blog system
 * written in pure PHP. 
 *
 * @subpackage blogez.php
 *
 * This script is the main wrap around functions used for generation process.
 * You can use this script and pass arguments to generate your blog. Do not 
 * forget to read appropriate README file for this project. All further questions
 * and issues should be reported on GitHub.
 * 
 */


# ~
require_once(__DIR__ . '/assets/funcs.php');

$blogez = new funcs_blogez();

switch ($argv[1]) {
    case 'create':
        $blogez->create_blog($argv[2]);
        break;
    
    case 'compile':
        $blogez->set_post_compile($argv[2], $argv[3], $argv[4]);
        $blogez->compile($argv[3], $argv[4]);
        break;

    default:
        $blogez->print_head();
        break;
}
