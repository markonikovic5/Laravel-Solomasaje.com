(function() {
	tinymce.PluginManager.add('orbital_tc_button', function( editor, url ) {
		editor.addButton( 'orbital_tc_button', {
			text: "Buttons ",
			icon: false,
			onclick: function() {
				editor.windowManager.open( {
					title: 'Insert Button',
					body: [{
						type: 'textbox',
						name: 'anchor',
						label: 'Anchor'
					},
					{
						type: 'textbox',
						name: 'url',
						label: 'URL'
					},
					{
						type: 'listbox',
						name: 'class',
						label: 'Style',
						'values': [
							{text: 'Normal', value: ''},
							{text: 'Primary', value: 'btn-primary'},
							{text: 'Outline Primary', value: 'btn-outline-primary'},
						]
					},
					{
						type: 'listbox',
						name: 'size',
						label: 'Size',
						'values': [
							{text: 'Normal', value: ''},
							{text: 'Large', value: 'btn-lg'},
							{text: 'Medium', value: 'btn-md'},
							{text: 'Small', value: 'btn-sm'},
						]
					}
				],
				onsubmit: function( e ) {
					editor.insertContent('<a class="btn ' + e.data.class + ' ' + e.data.size + '" href="' + e.data.url + '">' + e.data.anchor + '</a>');
				}
			});
		}
	});
});
})();


(function() {
	tinymce.PluginManager.add('orbital_tc_shortcodes', function( editor, url ) {

		editor.addButton( 'orbital_tc_shortcodes', {
			text: 'Cluster',
			icon: false,
			onclick: function() {
				editor.windowManager.open( {
					title: 'Insert Cluster',
					body: [
					{
						type: 'listbox',
						name: 'type',
						label: 'Type',
						'values': [
							{text: 'Category', value: 'category'},
							{text: 'Tag', value: 'tag'},
							{text: 'Pages', value: 'pages'},

						]
					},
					{
						type: 'textbox',
						name: 'data',
						label: 'Data'
					},
					{
                        type: 'button',
                        name: 'link',
                        text: 'Insert/Edit link',
                        onclick: function( e ) {
                            //get the Wordpess' "Insert/edit link" popup window.
                            var textareaId = jQuery('.mce-custom-textarea').attr('id');
                            wpActiveEditor = true; //we need to override this var as the link dialogue is expecting an actual wp_editor instance
                            wpLink.open( textareaId ); //open the link popup
                            return true;
                        },
                    },
				],
				onsubmit: function( e ) {

					if( e.data.type == "posts"){
						editor.insertContent('[orbital_' + e.data.type + ' category="' + e.data.data + '"]' );
					}

					if( e.data.type == "pages"){
						editor.insertContent('[orbital_' + e.data.type + ' ids="' + e.data.data + '"]' );
					}
				
				}
			});
		}
	});
});
})();

