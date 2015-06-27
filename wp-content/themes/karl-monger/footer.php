<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<footer>
    <div class="row">
        <div class="columns medium-12 text-center">
            <div class="copyright">
                <p>© 2008 - 2015 KARL MONGER Manuscript Editing • <a href="mailto:karlmonger@gmail.com">karlmonger@gmail.com</a></p>
            </div>
        </div>
    </div>
    <?php do_action( 'foundationpress_before_footer' ); ?>
    <?php dynamic_sidebar( 'footer-widgets' ); ?>
    <?php do_action( 'foundationpress_after_footer' ); ?>
</footer>
</section>
</div> <!-- End page-wrapper -->
</div> <!-- End columns -->
</div> <!-- End Row -->
<a class="exit-off-canvas"></a>

	<?php do_action( 'foundationpress_layout_end' ); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
