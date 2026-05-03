<?php

class Hash
{

	/**
	 * @param string $algo The algorithm (md5, sha1, whirlpool, etc)
	 * @param string $data The data to encode
	 * @param string $salt (This should be the same throughout the system probably)
	 * @return string The hash/salted data
	 */
	public static function create(string $algo, string $data, string $salt): string
	{
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);

		return hash_final($context);
	}
}