<?php


/* 
SELECT DISTINCT postmeta.meta_value AS customer_id FROM wp_sdpostmeta AS postmeta
		INNER JOIN wp_sdposts AS posts ON posts.ID = postmeta.post_id
		WHERE postmeta.meta_key = '_customer_user' AND 
		posts.post_type = 'shop_order' AND 
		posts.post_status = 'wc-completed'
*/
$all = array();

/*
SELECT DISTINCT postmeta.meta_value AS customer_id FROM wp_sdpostmeta AS postmeta
		INNER JOIN wp_sdposts AS posts ON posts.ID = postmeta.post_id
		WHERE postmeta.meta_key = '_customer_user' AND 
		posts.post_type = 'shop_order' AND 
		posts.post_modified BETWEEN '2025-05-01' AND '2025-06-01' AND 
		posts.post_status = 'wc-completed' 
*/
$exclude = array();

function flatten_rows(array $arr) 
{
    $ids = [];

	foreach ($arr as $item) {
		$id = $item['customer_id'];
		if (!is_numeric($id)) {
			continue;
		}

		$ids[] = (int) $id;
	}

	return $ids;
}

$cleanAll = flatten_rows($all);
$cleanExclude = flatten_rows($exclude);

$targetIds = array_diff($cleanAll, $cleanExclude);

echo implode(',', $targetIds) . "\n";

/*
SELECT 
    users.ID AS id, 
    users.user_login AS phone, 
    users.display_name AS full_name, 
    users.user_registered AS registered_at, 
FROM wp_sdusers AS users 
WHERE id IN ()
GROUP BY posts.post_modified 
ORDER BY users.user_registered DESC;
*/
