<?php
	/**
	 * @author 		Halis Duraki <halis_duraki@outlook.com>
	 * @package 	Blogez <https://github.com/blogez>
	 * 
	 * @description 
	 * The simplest static site generator / blog system
	 * written in pure PHP. 
	 *
	 * @subpackage funcs.php
	 *
	 * Use this file to implement new functions regarding your 
	 * static site. To keep in track what you have add, please
	 * document your code. Please send all pull requests to our
	 * official repository.
	 * 
	 */

	# ~
	require_once(__DIR__ . '/parsedown.inc.php');


	class funcs_blogez {
		
		# ~

		const author = "Halis Duraki <halis_duraki@outlook.com>";
		const packg  = "blogez";
		const github = "https://github.com/dn5/blogez";
		const tweet  = "@dn5__";


		# ~
		
		public $pst 	= "test-post.md";
		public $title 	= "This is a post.";
		public $prj 	= "test";

		function __construct() 
		{
			$debug 	= false;

			if ($debug == true) {
				# your function to debug
				
				//$this->compile($this->pst, $this->title);
				//$this->blogez_compile_post($this->pst, $this->title);
			}
		}

		public function set_post_compile($blog, $postname, $title) 
		{
			$this->prj 		= $blog;
			$this->pst 		= $postname;
			$this->title 	= $title;
		}

		# Remove file extension
		public function return_filename($postname) 
		{
			$postname = substr($postname, 0, -2);
			return $postname . 'html';
		}

		# Get content of the file for <head>
		private function blogez_get_head() 
		{
			return file_get_contents(__DIR__ . '/../blog/' . $this->prj . '/style/head.html');
		}

		# Get end of the html file </html>
		private function blogez_get_end()
		{
			return file_get_contents(__DIR__ . '/../blog/' . $this->prj . '/style/end.html');
		}

		/**
		 * Return HTML from a markdown post
		 * @param  string $postname 
		 */
		private function blogez_get_post($postname)
		{
			$pd = new Parsedown();
			return $pd->text(file_get_contents(__DIR__ . '/../blog/' . $this->prj . '/post/' . $postname));
		}

		/**
		 * Compile the post
		 * @param  string $postname
		 */
		private function blogez_compile_post($postname, $title)
		{
			# post header
			$head = '<header class="post-header">' . 
					'<h3>' . $title . '</h3>' .
					'<span class="date">' . date("M d, 'y") . '</span>' .
					'</header>';

			# final
			$compile = $this->blogez_get_head() . $head . $this->blogez_get_post($postname) . $this->blogez_get_end();

			return $compile;
		}

		/**
		 * Create a new blog
		 * @param  string $blog 
		 */
		public function create_blog($blog) 
		{
			if (!file_exists( 'blog/'.$blog )) {
				mkdir('blog/'.$blog, 0777, true);
				mkdir('blog/'.$blog.'/style', 0777, true);
				mkdir('blog/'.$blog.'/post',0777, true);
				mkdir('blog/'.$blog.'/style/css',0777, true);
				mkdir('blog/'.$blog.'/export',0777,true);
				mkdir('blog/'.$blog.'/export/css',0777,true);

				copy('blog/test/style/css/main.css', 'blog/'.$blog.'/style/css/main.css');
				copy('blog/test/style/css/override.css', 'blog/'.$blog.'/style/css/override.css');
				copy('blog/test/style/head.html', 'blog/'.$blog.'/style/head.html');
				copy('blog/test/style/end.html', 'blog/'.$blog.'/style/end.html');
				copy('blog/test/style/css/right1s.png', 'blog/'.$blog.'/style/css/right1s.png');
				copy('blog/test/export/css/right1s.png', 'blog/'.$blog.'/export/css/right1s.png');

				copy('blog/test/style/css/main.css', 'blog/'.$blog.'/export/css/main.css');
				copy('blog/test/style/css/override.css', 'blog/'.$blog.'/export/css/override.css');
				copy('blog/test/style/index.html', 'blog/'.$blog.'/export/index.html');

				fputs(STDOUT, "blogez created your blog.\n").
				fputs(STDOUT, "To access your blog, visit the directory:\n");
				fputs(STDOUT, "blog/" . $blog . "/\n");
			}
		}

		public function compile($postname, $title)
		{
			$dir 	= __DIR__ . '/../blog/' . $this->prj . '//export/';
			$file 	= $this->return_filename($postname);

			fputs(STDOUT, "Cool! blogez just compiled your " . $postname . " with a title " . $title . "\n");
			fputs(STDOUT, "You may access the post manually. Your link for accessing is " . $this->return_filename($postname) . "\n");
			fputs(STDOUT, "~ !\n");
			fputs(STDOUT, "To add your post on homepage, add this to your index.html site:\n");
			fputs(STDOUT, "<li><span>" . date("M d Y") . "</span> » <a href='" . $postname . "'>" . $title . "</a></li>\n");

			return file_put_contents($dir . $file, $this->blogez_compile_post($postname, $title));
		}

		public function print_head() {
			fputs(STDOUT, "Welcome to blogez~ !\n");
			fputs(STDOUT, "Stupid simple static site generator written in PHP.\n");
			fputs(STDOUT, "Visit Github @ dn5/blogez.\n");
			fputs(STDOUT, "-----------------------------------------------------\n");
			fputs(STDOUT, "Commands:\n");
			fputs(STDOUT, "blogez -help 	| Display help\n");
			fputs(STDOUT, "blogez -create  | Create a new blog\n");
			fputs(STDOUT, "blogez -compile | Compile a post\n");
			fputs(STDOUT, "	|\n");
			fputs(STDOUT, "	 -------- {blog} {post.md} {title}\n");
		}
	}