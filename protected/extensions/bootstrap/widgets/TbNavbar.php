<?php
/**
 * TbNavbar class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.7
 */

/**
 * Bootstrap navigation bar widget.
 */
class TbNavbar extends CWidget
{
    // Navbar types.
    const TYPE_SUBNAV = 'subnav';

	// Navbar fix locations.
	const FIXED_TOP = 'top';
	const FIXED_BOTTOM = 'bottom';

	/**
	 * @var string the text for the brand.
	 */
	public $brand;
	/**
	 * @var string the URL for the brand link.
	 */
	public $brandUrl;
	/**
	 * @var array the HTML attributes for the brand link.
	 */
	public $brandOptions = array();
	/**
	 * @var array navigation items.
	 * @since 0.9.8
	 */
	public $items = array();
	/**
	 * @var mixed fix location of the navbar if applicable.
	 * Valid values are 'top' and 'bottom'. Defaults to 'top'.
	 * Setting the value to false will make the navbar static.
	 * @since 0.9.8
	 */
	public $fixed = self::FIXED_TOP;
	/**
	* @var boolean whether the nav span over the full width. Defaults to false.
	* @since 0.9.8
	*/
	public $fluid = false;
	/**
	 * @var boolean whether to enable collapsing on narrow screens. Default to false.
	 */
	public $collapse = false;
    /**
     * @var string indicates whether this is a sub navigation.
     * @since 1.0.0
     */
    public $subnav = false;
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		if ($this->brand !== false)
		{
			if (!isset($this->brand))
				$this->brand = CHtml::encode(Yii::app()->name);

			if (!isset($this->brandUrl))
				$this->brandUrl = Yii::app()->homeUrl;

			$this->brandOptions['href'] = CHtml::normalizeUrl($this->brandUrl);

			if (isset($this->brandOptions['class']))
				$this->brandOptions['class'] .= ' brand';
			else
				$this->brandOptions['class'] = 'brand';
		}

		$classes = array('navbar');

        if (isset($this->subnav) && $this->subnav === true)
            $classes[] = 'navbar-subnav';

		if ($this->fixed !== false)
		{
			if (in_array($this->fixed, array(self::FIXED_TOP, self::FIXED_BOTTOM)))
            {
				$classes[] = 'navbar-fixed-'.$this->fixed;

                if (isset($this->subnav) && $this->subnav === true)
                    $classes[] = 'navbar-subnav-fixed';
            }
		}

        if (!empty($classes))
        {
            $classes = implode(' ', $classes);
            if (isset($this->htmlOptions['class']))
                $this->htmlOptions['class'] .= ' '.$classes;
            else
                $this->htmlOptions['class'] = $classes;
        }
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		$containerCssClass = $this->fluid ? 'container-fluid' : 'container';

		echo CHtml::openTag('div', $this->htmlOptions);
		echo '<div class="navbar-inner"><div class="'.$containerCssClass.'">';

        if ($this->collapse)
        {
            echo '<a class="btn btn-navbar" data-toggle="collapse" data-target=".'.$this->getCollapseTarget().'">';
			echo '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
			echo '</a>';
		}

        if ($this->brand !== false)
            echo CHtml::openTag('a', $this->brandOptions).$this->brand.'</a>';

		if ($this->collapse)
        {
            $this->controller->beginWidget('bootstrap.widgets.TbCollapse', array(
                'htmlOptions'=>array('class'=>$this->getCollapseCssClass()),
            ));
        }

		foreach ($this->items as $item)
		{
			if (is_string($item))
				echo $item;
			else
			{
				if (isset($item['class']))
				{
					$className = $item['class'];
					unset($item['class']);

					$this->controller->widget($className, $item);
				}
			}
		}

		if ($this->collapse)
            $this->controller->endWidget();

		echo '</div></div></div>';
	}

    /**
     * Returns the CSS class of the collapse target element.
     * @return string the class name
     */
    protected function getCollapseTarget()
    {
        return isset($this->subnav) && $this->subnav === true ? 'subnav-collapse' : 'nav-collapse';
    }

    /**
     * Returns the collapse CSS class name.
     * @return string the class name
     */
    protected function getCollapseCssClass()
    {
        return isset($this->subnav) && $this->subnav === true ? 'nav-collapse subnav-collapse' : 'nav-collapse';
    }
}
