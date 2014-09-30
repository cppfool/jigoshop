<?php
use Jigoshop\Helper\Product;
use Jigoshop\Helper\Render;

/**
 * @var $product \Jigoshop\Entity\Product The product.
 * @var $messages \Jigoshop\Core\Messages Messages container.
 */
?>

<?php do_action('jigoshop\product\before', $product); ?>
<article id="post-<?php echo $product->getId(); ?>" <?php post_class(); ?>>
	<h1><?php echo $product->getName(); ?></h1>
	<?php Render::output('shop/messages', array('messages' => $messages)); ?>
	<?php do_action('jigoshop\product\before_summary', $product); ?>
	<div class="summary">
		<p class="price"><?php echo Product::getPrice($product); ?></p>
		<p class="stock"><?php echo Product::getStock($product); ?></p>
		<?php echo $product->getDescription(); ?>
		<dl class="dl-horizontal">
			<?php if($product->getSku()): ?>
			<dt><?php echo __('SKU', 'jigoshop'); ?></dt><dd><?php echo $product->getSku(); ?></dd>
			<?php endif; ?>
			<?php if(count($product->getCategories()) > 0): ?>
			<dt><?php echo __('Categories', 'jigoshop'); ?></dt>
			<dd class="categories">
				<?php foreach($product->getCategories() as $category): ?>
					<a href="<?php echo $category['link']; ?>"><?php echo $category['name']; ?></a>
				<?php endforeach; ?>
			</dd>
			<?php endif; ?>
			<?php if(count($product->getTags()) > 0): ?>
			<dt><?php echo __('Tagged as', 'jigoshop'); ?></dt>
			<dd class="tags">
				<?php foreach($product->getTags() as $tag): ?>
					<a href="<?php echo $tag['link']; ?>"><?php echo $tag['name']; ?></a>
				<?php endforeach; ?>
			</dd>
			<?php endif; ?>
			<?php do_action('jigoshop\product\data', $product); ?>
		</dl>
		<?php do_action('jigoshop\product\summary', $product); ?>
	</div>
	<?php do_action('jigoshop\product\after_summary', $product); ?>
</article>
<?php do_action('jigoshop\product\after', $product); ?>
