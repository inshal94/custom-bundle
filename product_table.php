<table>
  <thead>
    <tr>
      <th colspan="2">Image</th>
      <th colspan="2">Product</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php
		$products = shopify_call($token, $shop, "/admin/api/2021-01/products.json", array(), "GET");
		$products = json_decode($products['response'], JSON_PRETTY_PRINT);

		foreach ($products as $product) {
			foreach ($product as $key => $value) {
				$image = '';

				if (count($value['images']) > 0) {
					$image = $value['images'][0]['src'];
				}

				// echo "<img src='". $image ."' width='60'> <br />";
				// echo $value['title'] . "<br />";
				?>
				<tr>
			      <td><a href="#"><img width="35" height="35" alt="" src="<?php echo $image; ?>"></a></td>
			      <td><a href="#"><?php echo $value['title']; ?></a></td>
			      <td><button class="secondary icon-trash"></button></td>
			    </tr>
			    <?php
			}
		}
	?>
  </tbody>
</table>