<?php

/*
   Interface: iVakkerElatedLayoutNode
   A interface that implements Layout Node methods
*/
interface iVakkerElatedLayoutNode {
	public function hasChidren();
	public function getChild($key);
	public function addChild($key, $value);
}

/*
   Interface: iVakkerElatedRender
   A interface that implements Render methods
*/
interface iVakkerElatedRender {
	public function render($factory);
}

/*
   Class: VakkerElatedPanel
   A class that initializes Elated Panel
*/
class VakkerElatedPanel implements iVakkerElatedLayoutNode, iVakkerElatedRender {
	public $children;
	public $title;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$name="",$hidden_property="",$hidden_value="",$hidden_values=array(),$args=array()) {
		$this->children = array();
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
		$this->args = $args;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		
		if(!empty($this->args['use_both_dep']) && !empty($this->hidden_property)) {
			$hidden1 = false;
			$hidden2 = false;
			foreach ($this->hidden_values as $value) {
				if (vakker_eltd_option_get_value($this->hidden_property)==$value) {
					$hidden1 = true;
				}
			}
			
			foreach ($this->args['additional_hidden_values'] as $value) {
				if (vakker_eltd_option_get_value($this->args['additional_hidden_property'])==$value) {
					$hidden2 = true;
				}
			}
			
			if(($hidden1 && $hidden2) || (!$hidden1 && $hidden2) || ($hidden1 && !$hidden2)) {
				$hidden = true;
			}
			
		} else if (!empty($this->hidden_property)){
			if (vakker_eltd_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			} else {
				foreach ($this->hidden_values as $value) {
					if (vakker_eltd_option_get_value($this->hidden_property)==$value) {
						$hidden = true;
					}
				}
			}
		}
		?>
		<div class="eltd-page-form-section-holder" id="eltd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<h3 class="eltd-page-section-title"><?php echo esc_html($this->title); ?></h3>
			<?php foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			} ?>
		</div>
	<?php
	}

	public function renderChild(iVakkerElatedRender $child, $factory) {
		$child->render($factory);
	}
}

class VakkerElatedContainer implements iVakkerElatedLayoutNode, iVakkerElatedRender {
	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;

		if (!empty($this->hidden_property)){
			if (vakker_eltd_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			} else {
				foreach ($this->hidden_values as $value) {
					if (vakker_eltd_option_get_value($this->hidden_property)==$value) {
						$hidden = true;
					}
				}
			}
		}
		?>
		<div class="eltd-page-form-container-holder" id="eltd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			} ?>
		</div>
		<?php
	}

	public function renderChild(iVakkerElatedRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: VakkerElatedContainerNoStyle
   A class that initializes Elated Container without css classes
*/
class VakkerElatedContainerNoStyle implements iVakkerElatedLayoutNode, iVakkerElatedRender {
	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array(),$args=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
		$this->args = $args;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		
		if (!empty($this->hidden_property)){
			if (vakker_eltd_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
				
				if(!empty($this->args) && $this->args['enable_panels_for_default_value']) {
					$hidden = false;
				}
			} else {
				foreach ($this->hidden_values as $value) {
					if (vakker_eltd_option_get_value($this->hidden_property)==$value) {
						$hidden = true;
					}
				}
			}
		}
		?>
		<div id="eltd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			} ?>
		</div>
	<?php
	}

	public function renderChild(iVakkerElatedRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: VakkerElatedGroup
   A class that initializes Elated Group
*/
class VakkerElatedGroup implements iVakkerElatedLayoutNode, iVakkerElatedRender {
	public $children;
	public $title;
	public $description;

	function __construct($title="",$description="") {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) { ?>

		<div class="eltd-page-form-section">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($this->title); ?></h4>
				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<?php foreach ($this->children as $child) {
						$this->renderChild($child, $factory);
					} ?>
				</div>
			</div>
		</div>
	<?php
	}

	public function renderChild(iVakkerElatedRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: VakkerElatedNotice
   A class that initializes Elated Notice
*/
class VakkerElatedNotice implements iVakkerElatedRender {
	public $children;
	public $title;
	public $description;
	public $notice;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$description="",$notice="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
		$this->notice = $notice;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (vakker_eltd_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			} else {
				foreach ($this->hidden_values as $value) {
					if (vakker_eltd_option_get_value($this->hidden_property)==$value) {
						$hidden = true;
					}
				}
			}
		}
		?>

		<div class="eltd-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($this->title); ?></h4>
				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="alert alert-warning">
						<?php echo esc_html($this->notice); ?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

/*
   Class: VakkerElatedRow
   A class that initializes Elated Row
*/
class VakkerElatedRow implements iVakkerElatedLayoutNode, iVakkerElatedRender {
	public $children;
	public $next;

	function __construct($next=false) {
		$this->children = array();
		$this->next = $next;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) { ?>
		
		<div class="row<?php if ($this->next) echo " next-row"; ?>">
			<?php foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			} ?>
		</div>
	<?php
	}

	public function renderChild(iVakkerElatedRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: VakkerElatedTitle
   A class that initializes Elated Title
*/
class VakkerElatedTitle implements iVakkerElatedRender {
	private $name;
	private $title;
	public $hidden_property;
	public $hidden_values = array();

	function __construct($name="",$title="",$hidden_property="",$hidden_value="") {
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (vakker_eltd_option_get_value($this->hidden_property)==$this->hidden_value) {
				$hidden = true;
			}
		}
		?>
		<h5 class="eltd-page-section-subtitle" id="eltd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
	<?php
	}
}

/*
   Class: VakkerElatedField
   A class that initializes Elated Field
*/
class VakkerElatedField implements iVakkerElatedRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();

	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $vakker_eltd_Framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$vakker_eltd_Framework->eltdOptions->addOption($this->name,$this->default_value, $type);
	}

	public function render($factory) {
		$hidden = false;
		
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (vakker_eltd_option_get_value($this->hidden_property)==$value) {
					$hidden = true;
				}
			}
		}
		
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

/*
   Class: VakkerElatedMetaField
   A class that initializes Elated Meta Field
*/
class VakkerElatedMetaField implements iVakkerElatedRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();
	
	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $vakker_eltd_Framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$vakker_eltd_Framework->eltdMetaBoxes->addOption($this->name, $this->default_value, $type);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (vakker_eltd_option_get_value($this->hidden_property)==$value) {
					$hidden = true;
				}
			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class VakkerElatedFieldType {

	abstract public function render( $name, $label="",$description="", $options = array(), $args = array(), $hidden = false );
}

class VakkerElatedFieldText extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$col_width = 12;
		if(isset($args["col_width"])) {
            $col_width = $args["col_width"];
        }

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false;

        $class = '';
        $data_string = '';
        if (!empty($repeat)) {
            if(array_key_exists('index', $repeat)) {
                $id = $name . '-' . $repeat['index'];
            } else {
                $id = $name;
            }
            if(array_key_exists('name', $repeat)) {
                $name = $repeat['name'];
            }
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'eltd-repeater-field';
        } else {
            $id = $name;
            $value = vakker_eltd_option_get_value($name);
        }

        if($label === '' && $description === '') {
            $class .= ' eltd-no-description';
        }

        if(isset($args['custom_class']) && $args['custom_class'] != '') {
            $class .= ' '  . $args['custom_class'];
        }

        if(isset($args['input-data']) && $args['input-data'] != '') {
            foreach($args['input-data'] as $data_key => $data_value) {
                $data_string .= $data_key . '=' . $data_value;
                $data_string .= ' ';
            }
        }
		?>

		<div class="eltd-page-form-section <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <?php if($suffix) : ?>
                            <div class="input-group">
                            <?php endif; ?>
                                <input type="text" <?php echo esc_attr($data_string); ?> class="form-control eltd-input eltd-form-element" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>" />
                                <?php if($suffix) : ?>
                                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                                <?php endif; ?>
                            <?php if($suffix) : ?>
                            </div>
                            <?php endif; ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class VakkerElatedFieldTextSimple extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$suffix = !empty($args['suffix']) ? $args['suffix'] : false; ?>

		<div class="col-lg-3" id="eltd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<?php if($suffix) : ?>
			<div class="input-group">
            <?php endif; ?>
				<input type="text" class="form-control eltd-input eltd-form-element" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars(vakker_eltd_option_get_value($name))); ?>" />
				<?php if($suffix) : ?>
					<div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
				<?php endif; ?>
			<?php if($suffix) : ?>
			</div>
			<?php endif; ?>
		</div>
	<?php
	}
}

class VakkerElatedFieldTextArea extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if ( ! empty( $repeat ) ) {
			if ( array_key_exists( 'index', $repeat ) ) {
				$id = $name . '-' . $repeat['index'];
			} else {
				$id = $name;
			}
			if ( array_key_exists( 'name', $repeat ) ) {
				$name = $repeat['name'];
			}
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id    = $name;
			$value = vakker_eltd_option_get_value( $name );
		}
		
		if ( $label === '' && $description === '' ) {
			$class .= ' eltd-no-description';
		}
		?>
		
		<div class="eltd-page-form-section <?php echo esc_attr( $class ); ?>" id="eltd_<?php echo esc_attr( $id ); ?>">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control eltd-form-element" name="<?php echo esc_attr( $name ); ?>" rows="5"><?php echo esc_html( htmlspecialchars( $value ) ); ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class VakkerElatedFieldTextAreaSimple extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {	?>
		<div class="col-lg-3">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<textarea class="form-control eltd-form-element" name="<?php echo esc_attr($name); ?>" rows="5"><?php echo esc_html(vakker_eltd_option_get_value($name)); ?></textarea>
		</div>
	<?php
	}
}

class VakkerElatedFieldTextAreaHtml extends VakkerElatedFieldType {
	
	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
		
		$class = '';
		if (!empty($repeat)) {
            if(array_key_exists('index', $repeat)) {
                $id = $name . '_' . $repeat['index'];
				$field_id = $name . '_textarea_' . $repeat['index'];
            } else {
                $id = $name;
				$field_id = $name . '_textarea';
            }
            if(array_key_exists('name', $repeat)) {
                $name = $repeat['name'];
            }
            $name .= '[]';
            $value = $repeat['value'];
            $class .= ' eltd-repeater-field';
		} else {
			$id = $field_id = $name;
            $value = vakker_eltd_option_get_value($name);
		}

        if($label === '' && $description === '') {
            $class .= ' eltd-no-description';
        }

		?>
		<div class="eltd-page-form-section <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<?php wp_editor( $value, $field_id, array('textarea_name' => $name, 'height' => '200'));?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class VakkerElatedFieldColor extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {	?>
		<div class="eltd-page-form-section" id="eltd_<?php echo esc_attr($name); ?>">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(vakker_eltd_option_get_value($name)); ?>" class="my-color-field"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class VakkerElatedFieldColorSimple extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="col-lg-3" id="eltd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(vakker_eltd_option_get_value($name)); ?>" class="my-color-field"/>
		</div>
	<?php
	}
}

class VakkerElatedFieldImage extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

        $class = '';
        if (!empty($repeat)) {
            if(array_key_exists('index', $repeat)) {
                $id = $name . '-' . $repeat['index'];
            } else {
                $id = $name;
            }
            if(array_key_exists('name', $repeat)) {
                $name = $repeat['name'];
            }
            $name .= '[]';
            $value = $repeat['value'];
            $has_image = !empty($value);
            $class = 'eltd-repeater-field';
        } else {
            $id = $name;
            $has_image = vakker_eltd_option_has_value($name);
            $value = vakker_eltd_option_get_value($name);
        }

        if($label === '' && $description === '') {
            $class .= ' eltd-no-description';
        }
        ?>

		<div class="eltd-page-form-section <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="eltd-media-uploader">
								<div<?php if (!$has_image) { ?> style="display: none"<?php } ?> class="eltd-media-image-holder">
									<img src="<?php if ($has_image) { echo esc_url(vakker_eltd_get_attachment_thumb_url($value)); } ?>" alt="" class="eltd-media-image img-thumbnail" />
								</div>
								<div style="display: none" class="eltd-media-meta-fields">
									<input type="hidden" class="eltd-media-upload-url" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>"/>
								</div>
								<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'vakker'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'vakker'); ?>"><?php esc_html_e('Upload', 'vakker'); ?></a>
								<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'vakker'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class VakkerElatedFieldImageSimple extends VakkerElatedFieldType {
    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) { ?>
        <div class="col-lg-3" id="eltd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="eltd-field-description"><?php echo esc_html($label); ?></em>
            <div class="eltd-media-uploader">
                <div<?php if (!vakker_eltd_option_has_value($name)) { ?> style="display: none"<?php } ?> class="eltd-media-image-holder">
                    <img src="<?php if (vakker_eltd_option_has_value($name)) { echo esc_url(vakker_eltd_get_attachment_thumb_url(vakker_eltd_option_get_value($name))); } ?>" alt="" class="eltd-media-image img-thumbnail"/>
                </div>
                <div style="display: none" class="eltd-media-meta-fields">
                    <input type="hidden" class="eltd-media-upload-url" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(vakker_eltd_option_get_value($name)); ?>"/>
                </div>
                <a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'vakker'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'vakker'); ?>"><?php esc_attr_e('Upload', 'vakker'); ?></a>
                <a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_attr_e('Remove', 'vakker'); ?></a>
            </div>
        </div>
    <?php
    }
}

class VakkerElatedFieldFont extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $vakker_eltd_fonts_array;
		?>

		<div class="eltd-page-form-section">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="eltd-select2 form-control eltd-form-element" name="<?php echo esc_attr($name); ?>">
								<option value="-1"><?php esc_html_e( 'Default', 'vakker' ); ?></option>
								<?php foreach($vakker_eltd_fonts_array as $fontArray) { ?>
									<option <?php if (vakker_eltd_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class VakkerElatedFieldFontSimple extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $vakker_eltd_fonts_array;
		?>

		<div class="col-lg-3">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<select class="eltd-select2 form-control eltd-form-element" name="<?php echo esc_attr($name); ?>">
				<option value="-1"><?php esc_html_e( 'Default', 'vakker' ); ?></option>
				<?php foreach($vakker_eltd_fonts_array as $fontArray) { ?>
					<option <?php if (vakker_eltd_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
				<?php } ?>
			</select>
		</div>
	<?php
	}
}

class VakkerElatedFieldSelect extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat= array() ) {
        $class = '';

        if (!empty($repeat)) {
            if(array_key_exists('index', $repeat)) {
                $id = $name . '-' . $repeat['index'];
            } else {
                $id = $name;
            }
            if(array_key_exists('name', $repeat)) {
                $name = $repeat['name'];
            }
            $name .= '[]';
            $rvalue = $repeat['value'];
            $class = 'eltd-repeater-field';
        } else {
            $id = $name;
            $rvalue = vakker_eltd_option_get_value($name);
        }
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$show = array();
		if(isset($args["show"])) {
			$show = $args["show"];
		}
		
		$hide = array();
		if(isset($args["hide"])) {
			$hide = $args["hide"];
		}

		$select2 = '';
		if (isset($args['select2'])) {
			$select2 = 'eltd-select2';
		}
		$col_width = 3;
		if(isset($args['col_width'])) {
		    $col_width = $args['col_width'];
        }

		$switcher = '';
		$data_switch_type = '';
		$data_switch_property = '';
		$data_switch_enabled = '';
		if(isset($args["use_as_switcher"]))
            $switcher = $args["use_as_switcher"] ? 'eltd-switcher' : "";
		    if(isset($args['switch_type'])) {
                $data_switch_type = $args['switch_type'];
            }
            if(isset($args['switch_property'])) {
                $data_switch_property = $args['switch_property'];
            }
        if(isset($args['switch_enabled'])) {
            $data_switch_enabled = $args['switch_enabled'];
        }

        if($label === '' && $description === '') {
            $class .= ' eltd-no-description';
        }

		?>

		<div class="eltd-page-form-section <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
							<select class="<?php echo esc_attr($select2) . ' ' . esc_attr($switcher); ?> form-control eltd-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                                data-switch-type="<?php echo esc_attr($data_switch_type); ?>"
                                data-switch-property="<?php echo esc_attr($data_switch_property); ?>"
                                data-switch-enabled="<?php echo esc_attr($data_switch_enabled); ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
									name="<?php echo esc_attr($name); ?>">
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if ($rvalue == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class VakkerElatedFieldSelectBlank extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$show = array();
		if(isset($args["show"])) {
			$show = $args["show"];
		}
		
		$hide = array();
		if(isset($args["hide"])) {
			$hide = $args["hide"];
		}

		$select2 = '';
		if (isset($args['select2'])) {
			$select2 = ($args['select2']) ? 'eltd-select2' : '';
		}
		?>

		<div class="eltd-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="<?php echo esc_attr($select2); ?> form-control eltd-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
									name="<?php echo esc_attr($name); ?>">
								<option <?php if (vakker_eltd_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if (vakker_eltd_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class VakkerElatedFieldSelectSimple extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        $dependence = false;
        if(isset($args["dependence"])) {
	        $dependence = true;
        }
        
        $show = array();
        if(isset($args["show"])) {
	        $show = $args["show"];
        }
        
        $hide = array();
        if(isset($args["hide"])) {
	        $hide = $args["hide"];
        }
        ?>
		
		<div class="col-lg-3">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control eltd-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                <?php foreach($show as $key=>$value) { ?>
                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key=>$value) { ?>
                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if (vakker_eltd_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                    <option <?php if (vakker_eltd_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
		</div>
	<?php
	}
}

class VakkerElatedFieldSelectBlankSimple extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        $dependence = false;
        if(isset($args["dependence"])) {
	        $dependence = true;
        }
        
        $show = array();
        if(isset($args["show"])) {
	        $show = $args["show"];
        }
        
        $hide = array();
        if(isset($args["hide"])) {
	        $hide = $args["hide"];
        }
        ?>

		<div class="col-lg-3">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control eltd-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                <?php foreach($show as $key=>$value) { ?>
                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key=>$value) { ?>
                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if (vakker_eltd_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                    <option <?php if (vakker_eltd_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
		</div>
	<?php
	}
}

class VakkerElatedFieldYesNo extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$switcher_name = $name;

		$class = '';
		$tname = $name;
		if (!empty($repeat)) {
			if(array_key_exists('index', $repeat)) {
				$id = $name . '-' . $repeat['index'];
			} else {
				$id = $name;
			}
			if(array_key_exists('name', $repeat)) {
				$name = $repeat['name'];
				$tname = $repeat['name'];
			}
			$name .= '[]';
			$tname .= '_yesno[]';
			$rvalue = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id = $name;
			$rvalue = vakker_eltd_option_get_value($name);
		}

		if($label === '' && $description === '') {
			$class .= ' eltd-no-description';
		}

		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}

		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}

		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		
		<div class="eltd-page-form-section <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch switch-<?php echo esc_attr($switcher_name); ?>">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
								       class="cb-enable<?php if ($rvalue == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'vakker') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
								       class="cb-disable<?php if ($rvalue == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'vakker') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
								       name="<?php echo esc_attr($tname); ?>" value="yes"<?php if ($rvalue == "yes") { echo " checked"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($rvalue); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class VakkerElatedFieldYesNoSimple extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="col-lg-3">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<p class="field switch">
				<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
					   class="cb-enable<?php if (vakker_eltd_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'vakker') ?></span></label>
				<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
					   class="cb-disable<?php if (vakker_eltd_option_get_value($name) == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'vakker') ?></span></label>
				<input type="checkbox" id="checkbox" class="checkbox"
					   name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if (vakker_eltd_option_get_value($name) == "yes") { echo " selected"; } ?>/>
				<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(vakker_eltd_option_get_value($name)); ?>"/>
			</p>
		</div>
	<?php
	}
}

class VakkerElatedFieldOnOff extends VakkerElatedFieldType {
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltd-page-form-section" id="eltd_<?php echo esc_attr($name); ?>">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (vakker_eltd_option_get_value($name) == "on") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('On', 'vakker') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (vakker_eltd_option_get_value($name) == "off") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Off', 'vakker') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_onoff" value="on"<?php if (vakker_eltd_option_get_value($name) == "on") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(vakker_eltd_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}