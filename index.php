<?php
/**
 * Plugin Name: Plugin Piano Scale
 * Plugin URI: http://
 * Description: Plugin Piano Scale is manage and show chord of piano
 * Version: 1.0
 * Author: Minhngoc.ith
 * Author URI: Null
 */
define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('POST_TYPE', 'piano_scales');

/**
 * REGISTER CUSTOM POST TYPE
 */
function register_posttype () {
	$labels = array(
		"name"           => "Piano scales",
		"singular_name"  => "Piano scales",
		"menu_name"      => "Piano scales",
		"name_admin_bar" => "piano_scales",
		"add_new"        => "Add Chord",
		"add_new_item"   => "Add New chord",
		"new_item"       => "New Chord",
	);
	$supports = array(
		"title",
	);
	$args = array(
		"labels"    => $labels,
		"menu_icon" => "dashicons-format-audio",
		"public"    => true,
		"supports"  => $supports,
	);
	register_post_type(POST_TYPE, $args);
}
add_action('init', 'register_posttype');

/**
 * REGISTER TAXONOMY
 */

function register_taxonomy_root () {
	$taxonomy = "piano_root";
	$labels = array(
		"name"          => "Root",
		"singular_name" => "Root",
		"edit_item"     => "Edit Root",
		"search_items"  => "Search Root",
		"update_item"   => "Update Root",
		"add_new_item"  => "Add New Root",
		"new_item_name" => "New Root",
		"menu_name"     => "Root"
	);
	$args = array(
		"public"            => true,
		"hierarchical"      => true,
		"labels"            => $labels,
		"query_var"         => true,
		"show_ui"           => true,
		"show_admin_column" => true,
		"sort" => true
	);
	register_taxonomy($taxonomy, array(POST_TYPE), $args);
}
add_action('init', 'register_taxonomy_root');

function register_taxonomy_type () {
	$taxonomy = "piano_type";
	$labels = array(
		"name"          => "Type",
		"singular_name" => "Type",
		"edit_item"     => "Edit Type",
		"search_items"  => "Search Type",
		"update_item"   => "Update Type",
		"add_new_item"  => "Add New Type",
		"new_item_name" => "New Type",
		"menu_name"     => "Type"
	);
	$args = array(
		"public"            => true,
		"hierarchical"      => true,
		"labels"            => $labels,
		"query_var"         => true,
		"show_ui"           => true,
		"show_admin_column" => true,
	);
	register_taxonomy($taxonomy, array(POST_TYPE), $args);
}
add_action('init', 'register_taxonomy_type');

function register_taxonomy_bass () {
	$taxonomy = "piano_bass";
	$labels = array(
		"name"          => "Bass",
		"singular_name" => "Bass",
		"edit_item"     => "Edit Bass",
		"search_items"  => "Search Bass",
		"update_item"   => "Update Bass",
		"add_new_item"  => "Add New Bass",
		"new_item_name" => "New Bass",
		"menu_name"     => "Bass"
	);
	$args = array(
		"public"            => true,
		"hierarchical"      => true,
		"labels"            => $labels,
		"query_var"         => true,
		"show_ui"           => true,
		"show_admin_column" => true,
	);
	register_taxonomy($taxonomy, array(POST_TYPE), $args);
}
add_action('init', 'register_taxonomy_bass');

/**
 * REGISTER META BOX
 * 
 */

if (is_admin()) {
	add_action('load-post.php', 'register_meta_class');
	add_action('load-post-new.php', 'register_meta_class');
}

function register_meta_class() {
	new pianoClass();
}

class pianoClass {
	public function __construct () {
		add_action('add_meta_boxes', array($this, 'add_meta_box'));
		add_action('save_post', array($this, 'save'));
	}

	public function add_meta_box ($post_type) {
		$post_types = array(POST_TYPE);
		
		if ( in_array($post_type, $post_types) ) {
			add_meta_box('pb-1', __('Select note', 'pb'), array($this, 'render_meta_box_primary'), POST_TYPE);
			add_meta_box('pb-2', __('Choose another note', 'pb'), array($this, 'render_meta_box_secondary'), POST_TYPE);
		}
	}

	public function render_meta_box_primary ($post) {
		wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );
		$value = get_post_meta( $post->ID, 'piano_note', true );
	?>
		<div class="box_piano">
			<div class="piano">
				<svg data-name='piano' xmlns="http://www.w3.org/2000/svg" viewBox='0 0 491 175'>
					<g class="group-note">
						<path class="white" id="1" d="M 0 8 L 0 175 L 36 175 L 36 8 L 0 8 Z" data-index="1" data-note='F'/>
						<path class="white" d="M 36 8 L 36 175 L 71 175 L 71 8 L 71 8 Z" data-index="3" data-note='G'/>
						<path class="white" d="M 71 8 L 71 175 L 106 175 L 106 8 L 106 8 Z" data-index="5" data-note='A'/>
						<path class="white" d="M 106 8 L 106 175 L 141 175 L 141 8 L 106 8 Z" data-index="7" data-note='B'/>
						<path class="white" d="M 141 8 L 141 175 L 176 175 L 176 8 L 141 8 Z" data-index="8" data-note='C'/>
						<path class="white" d="M 176 8 L 176 175 L 211 175 L 211 8 L 176 8 Z" data-index="10" data-note='D'/>
						<path class="white" d="M 211 8 L 211 175 L 246 175 L 246 8 L 211 8 Z" data-index="12" data-note='E'/>
						<path class="white" d="M 246 8 L 246 175 L 281 175 L 281 8 L 246 8 Z" data-index="13" data-note='F'/>
						<path class="white" d="M 281 8 L 281 175 L 316 175 L 316 8 L 281 8 Z" data-index="15" data-note='G'/>
						<path class="white" d="M 316 8 L 316 175 L 351 175 L 351 8 L 316 8 Z" data-index="17" data-note='A'/>
						<path class="white" d="M 351 8 L 351 175 L 386 175 L 386 8 L 351 8 Z" data-index="19" data-note='B'/>
						<path class="white" d="M 386 8 L 386 175 L 421 175 L 421 8 L 386 8 Z" data-index="20" data-note='C'/>
						<path class="white" d="M 421 8 L 421 175 L 456 175 L 456 8 L 421 8 Z" data-index="22" data-note='D'/>
						<path class="white" d="M 456 8 L 456 175 L 491 175 L 491 8 L 456 8 Z" data-index="24" data-note='E'/>
						<path class="black" d="M 22 8 L 22 110 L 50 110 L 50 8 L 22 8 Z" data-index="2" data-note='F#|Gb' data-idx='-1'/>
						<path class="black" d="M 57 8 L 57 110 L 85 110 L 85 8 L 57 8 Z" data-index="4" data-note='G#|Ab' data-idx='-1'/>
						<path class="black" d="M 92 8 L 92 110 L 120 110 L 120 8 L 92 8 Z" data-index="6" data-note='A#|Bb' data-idx='-1'/>
						<path class="black" d="M 162 8 L 162 110 L 190 110 L 190 8 L 162 8 Z" data-index="9" data-note='C#|Db' data-idx='-1'/>
						<path class="black" d="M 197 8 L 197 110 L 225 110 L 225 8 L 197 8 Z" data-index="11" data-note='D#|Eb' data-idx='-1'/>
						<path class="black" d="M 267 8 L 267 110 L 295 110 L 295 8 L 267 8 Z" data-index="14" data-note='F#|Gb' data-idx='-1'/>
						<path class="black" d="M 302 8 L 302 110 L 330 110 L 330 8 L 302 8 Z" data-index="16" data-note='G#|Ab' data-idx='-1'/>
						<path class="black" d="M 337 8 L 337 110 L 365 110 L 365 8 L 337 8 Z" data-index="18" data-note='A#|Bb' data-idx='-1'/>
						<path class="black" d="M 407 8 L 407 110 L 435 110 L 435 8 L 407 8 Z" data-index="21" data-note='C#|Db' data-idx='-1'/>
						<path class="black" d="M 442 8 L 442 110 L 470 110 L 470 8 L 442 8 Z" data-index="23" data-note='D#|Eb' data-idx='-1'/>
					</g>

					<g class="group-text">
						<g class='text-note-white' data-index='1'>
								<circle cx='18' cy='157' r='15'/>
								<text x='18' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='2'>
								<circle cx='36' cy='94' r='12'/>
								<text x='36' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='3'>
								<circle cx='53' cy='157' r='15'/>
								<text x='53' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='4'>
								<circle cx='71' cy='94' r='12'/>
								<text x='71' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='5'>
								<circle cx='88' cy='157' r='15'/>
								<text x='88' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='6'>
								<circle cx='106' cy='94' r='12'/>
								<text x='106' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='7'>
								<circle cx='123' cy='157' r='15'/>
								<text x='123' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='8'>
								<circle cx='158' cy='157' r='15'/>
								<text x='158' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='9'>
								<circle cx='176' cy='94' r='12'/>
								<text x='176' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='10'>
								<circle cx='193' cy='157' r='15'/>
								<text x='193' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='11'>
								<circle cx='211' cy='94' r='12'/>
								<text x='211' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='12'>
								<circle cx='228' cy='157' r='15'/>
								<text x='228' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='13'>
								<circle cx='263' cy='157' r='15'/>
								<text x='263' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='14'>
								<circle cx='281' cy='94' r='12'/>
								<text x='281' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='15'>
								<circle cx='298' cy='157' r='15'/>
								<text x='298' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='16'>
								<circle cx='316' cy='94' r='12'/>
								<text x='316' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='17'>
								<circle cx='333' cy='157' r='15'/>
								<text x='333' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='18'>
								<circle cx='351' cy='94' r='12'/>
								<text x='351' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='19'>
								<circle cx='368' cy='157' r='15'/>
								<text x='368' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='20'>
								<circle cx='403' cy='157' r='15'/>
								<text x='403' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='21'>
								<circle cx='421' cy='94' r='12'/>
								<text x='421' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='22'>
								<circle cx='438' cy='157' r='15'/>
								<text x='438' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-black' data-index='23'>
								<circle cx='456' cy='94' r='12'/>
								<text x='456' y='94' dy='.3em' text-anchor="middle"></text>
						</g>
						<g class='text-note-white' data-index='24'>
								<circle cx='473' cy='157' r='15'/>
								<text x='473' y='157' dy='.3em' text-anchor="middle"></text>
						</g>
					</g>
					<path class="line-top" d="M 0 0 L 510 0 L 510 8 L 0 8 L 0 0 Z"/>
				</svg>
				<input type="hidden" name="piano_note" readonly value='<?php echo $value; ?>'>
			</div>
		</div>
	<?php
	}

	public function render_meta_box_secondary ($post) {
		wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );
		$arr_value = get_post_meta( $post->ID, 'piano_another_note', true );
	?>
		<div class="piano-another">
			<div class="add-btn"><button type="button" class="btn-click-add-piano">+ Add</button></div>
			<div class="piano-grid">
			<?php
				if ( $arr_value ) {
					foreach ($arr_value as $value) {
					?>
						<div class="piano-col">
							<div class="piano-box">
								<div class="piano-box-head"><button type="button" class="piano-del">X</button></div>
								<div class="piano">
									<svg data-name='piano' xmlns="http://www.w3.org/2000/svg" viewBox='0 0 491 175'> <g class="group-note"> <path class="white" id="1" d="M 0 8 L 0 175 L 36 175 L 36 8 L 0 8 Z" data-index="1" data-note='F'/> <path class="white" d="M 36 8 L 36 175 L 71 175 L 71 8 L 71 8 Z" data-index="3" data-note='G'/> <path class="white" d="M 71 8 L 71 175 L 106 175 L 106 8 L 106 8 Z" data-index="5" data-note='A'/> <path class="white" d="M 106 8 L 106 175 L 141 175 L 141 8 L 106 8 Z" data-index="7" data-note='B'/> <path class="white" d="M 141 8 L 141 175 L 176 175 L 176 8 L 141 8 Z" data-index="8" data-note='C'/> <path class="white" d="M 176 8 L 176 175 L 211 175 L 211 8 L 176 8 Z" data-index="10" data-note='D'/> <path class="white" d="M 211 8 L 211 175 L 246 175 L 246 8 L 211 8 Z" data-index="12" data-note='E'/> <path class="white" d="M 246 8 L 246 175 L 281 175 L 281 8 L 246 8 Z" data-index="13" data-note='F'/> <path class="white" d="M 281 8 L 281 175 L 316 175 L 316 8 L 281 8 Z" data-index="15" data-note='G'/> <path class="white" d="M 316 8 L 316 175 L 351 175 L 351 8 L 316 8 Z" data-index="17" data-note='A'/> <path class="white" d="M 351 8 L 351 175 L 386 175 L 386 8 L 351 8 Z" data-index="19" data-note='B'/> <path class="white" d="M 386 8 L 386 175 L 421 175 L 421 8 L 386 8 Z" data-index="20" data-note='C'/> <path class="white" d="M 421 8 L 421 175 L 456 175 L 456 8 L 421 8 Z" data-index="22" data-note='D'/> <path class="white" d="M 456 8 L 456 175 L 491 175 L 491 8 L 456 8 Z" data-index="24" data-note='E'/> <path class="black" d="M 22 8 L 22 110 L 50 110 L 50 8 L 22 8 Z" data-index="2" data-note='F#|Gb' data-idx='-1'/> <path class="black" d="M 57 8 L 57 110 L 85 110 L 85 8 L 57 8 Z" data-index="4" data-note='G#|Ab' data-idx='-1'/> <path class="black" d="M 92 8 L 92 110 L 120 110 L 120 8 L 92 8 Z" data-index="6" data-note='A#|Bb' data-idx='-1'/> <path class="black" d="M 162 8 L 162 110 L 190 110 L 190 8 L 162 8 Z" data-index="9" data-note='C#|Db' data-idx='-1'/> <path class="black" d="M 197 8 L 197 110 L 225 110 L 225 8 L 197 8 Z" data-index="11" data-note='D#|Eb' data-idx='-1'/> <path class="black" d="M 267 8 L 267 110 L 295 110 L 295 8 L 267 8 Z" data-index="14" data-note='F#|Gb' data-idx='-1'/> <path class="black" d="M 302 8 L 302 110 L 330 110 L 330 8 L 302 8 Z" data-index="16" data-note='G#|Ab' data-idx='-1'/> <path class="black" d="M 337 8 L 337 110 L 365 110 L 365 8 L 337 8 Z" data-index="18" data-note='A#|Bb' data-idx='-1'/> <path class="black" d="M 407 8 L 407 110 L 435 110 L 435 8 L 407 8 Z" data-index="21" data-note='C#|Db' data-idx='-1'/> <path class="black" d="M 442 8 L 442 110 L 470 110 L 470 8 L 442 8 Z" data-index="23" data-note='D#|Eb' data-idx='-1'/> </g><g class="group-text"> <g class='text-note-white' data-index='1'> <circle cx='18' cy='157' r='15'/> <text x='18' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='2'> <circle cx='36' cy='94' r='12'/> <text x='36' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='3'> <circle cx='53' cy='157' r='15'/> <text x='53' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='4'> <circle cx='71' cy='94' r='12'/> <text x='71' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='5'> <circle cx='88' cy='157' r='15'/> <text x='88' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='6'> <circle cx='106' cy='94' r='12'/> <text x='106' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='7'> <circle cx='123' cy='157' r='15'/> <text x='123' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='8'> <circle cx='158' cy='157' r='15'/> <text x='158' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='9'> <circle cx='176' cy='94' r='12'/> <text x='176' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='10'> <circle cx='193' cy='157' r='15'/> <text x='193' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='11'> <circle cx='211' cy='94' r='12'/> <text x='211' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='12'> <circle cx='228' cy='157' r='15'/> <text x='228' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='13'> <circle cx='263' cy='157' r='15'/> <text x='263' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='14'> <circle cx='281' cy='94' r='12'/> <text x='281' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='15'> <circle cx='298' cy='157' r='15'/> <text x='298' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='16'> <circle cx='316' cy='94' r='12'/> <text x='316' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='17'> <circle cx='333' cy='157' r='15'/> <text x='333' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='18'> <circle cx='351' cy='94' r='12'/> <text x='351' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='19'> <circle cx='368' cy='157' r='15'/> <text x='368' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='20'> <circle cx='403' cy='157' r='15'/> <text x='403' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='21'> <circle cx='421' cy='94' r='12'/> <text x='421' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='22'> <circle cx='438' cy='157' r='15'/> <text x='438' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='23'> <circle cx='456' cy='94' r='12'/> <text x='456' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='24'> <circle cx='473' cy='157' r='15'/> <text x='473' y='157' dy='.3em' text-anchor="middle"></text> </g> </g> <path class="line-top" d="M 0 0 L 510 0 L 510 8 L 0 8 L 0 0 Z"/> </svg>
									<input type="hidden" name="piano_another_note[]" readonly value='<?php echo $value; ?>''>
								</div>
							</div>
						</div>
					<?php
					}
				}
			?>
			</div>
		</div>
	<?php
	}

	public function save ($post_id) {
		if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) ) {
			return $post_id;
		}
		$nonce = $_POST['myplugin_inner_custom_box_nonce'];
		if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) ) {
			return $post_id;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}
		$piano_note = sanitize_text_field( $_POST['piano_note'] );
		update_post_meta( $post_id, 'piano_note', $piano_note );
		$piano_another_note = $_POST['piano_another_note'];
		update_post_meta( $post_id, 'piano_another_note', $piano_another_note );
	}
}

/**
 * REGISTER STYLE & SCRIPT
 */

function register_style_script () {
	wp_enqueue_style('style-admin', PLUGIN_URL."css/style-admin.css");
	wp_enqueue_style('style-piano', PLUGIN_URL."css/style-piano.css");
	wp_enqueue_script('jQuery');
	wp_enqueue_script('script-admin', PLUGIN_URL."js/script-admin.js");
}

add_action('admin_footer', 'register_style_script');

/**
 * REGISTER API
 */

add_action('rest_api_init', 'register_api');

function register_api () {
	register_rest_route('/piano_scales', '/posts', [
		'methods' => 'GET',
		'callback' => 'api_get_chord',
	]);

	register_rest_route('/piano_scales', '/taxonomy', [
		'methods' => 'GET',
		'callback' => 'api_get_taxonomy',
	]);
}

function api_get_chord () {
	$data = [];
	$args = [
		'post_type'      => POST_TYPE,
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'ID',
	];
	$post = get_posts($args);
	
	foreach ($post as $key => $value) {
		$term_data = [];
		$terms = get_the_terms($value->ID, ['piano_root', 'piano_type', 'piano_bass']);
		$meta = get_post_meta($value->ID, 'piano_note', true );
		foreach ($terms as $val) {
			array_push($term_data, $val->term_id);
		}

		$data[] = [
			'chord' => $value->post_title,
			'note' => json_decode($meta),
			'taxo' => $term_data,
		];
	}
	
	// return $post;
	return $data;
}

function api_get_taxonomy () {
	$data = [];
	$term = get_terms(['piano_root', 'piano_type', 'piano_bass']);

	foreach ($term as $value) {
		array_push($data, $value);
	}

	return $data;
}
?>