( function( api ) {

	// Extends our custom "film-studio" section.
	api.sectionConstructor['film-studio'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );