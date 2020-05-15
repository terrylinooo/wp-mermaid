/**
 * WP Mermaid - Gutenberg Block.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

( function( blocks ) {

    blocks.registerBlockType( 'mermaid/block', {

		title: 'WP Mermaid',
	
		icon: 'chart-pie',
	
		category: 'formatting',

		attributes: {
			content: {
				type: 'string',
				source: 'text',
				selector: 'div'
			}
		},

		edit: function( props ) {

			let content = props.attributes.content;
			let rendered;

			function onChangeContent( content ) {
				props.setAttributes( { content } );

				setTimeout( function() {
					mermaid.init();
				}, 1000 );
			}
			
			try {
				rendered = '<div class="mermaid">' + "\n" + content + "\n"  + '</div>';
				
			} catch ( e ) {
				rendered = `<span style='color: red; text-align: center;'>${e}</span>`;
			}

			return wp.element.createElement(
				'div',
				{
					className: 'wp-block-mermaid-block-editor'
				},
				[
					wp.element.createElement(
						'div',
						{
							className: 'mermaid-editor'
						}, 
						[
							wp.element.createElement(
								wp.editor.PlainText, 
								{
									onChange: onChangeContent,
									value: content
								} 
							),
							wp.element.createElement( 'hr' )
						] 
					),
					wp.element.createElement(
						'div',
						{
							className: props.className,
							dangerouslySetInnerHTML: {  __html: rendered }
						} 
					)
				]
			);
		},

		save: function( props ) {
			let content = props.attributes.content;

			return wp.element.createElement(
				'div',
				{
					className: 'mermaid'
				},
				"\n" + content + "\n"
			);
        }
    } );
} )(
	window.wp.blocks
);
