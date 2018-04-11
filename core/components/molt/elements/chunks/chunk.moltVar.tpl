<script>
	var global = {
		siteUrl: '[[++site_url]]',
		baseUrl: '[[++base_url]]',
		assetsUrl: '[[++assets_url]]',
		cultureKey: '[[++cultureKey]]'
	}
	[[+jsDeferred:is=`1`:then=`
		var jsDeferred = {
			minJs: '[[+jsUrl]]'
		}
	`:else=``]]
	[[+cssDeferred:is=`1`:then=`
		var cssDeferred = {
			minCss: '[[+cssUrl]]'
		}
	`:else=``]]
</script>