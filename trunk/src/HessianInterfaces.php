<?php
/*
 * This file is part of the HessianPHP package.
 * (c) 2004-2010 Manuel G�mez
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Defines a contract for object creation used by the decoders
 */
interface IHessianObjectFactory{
	public function getObject($type);
}

/**
 * Used for custom parsers that handle a particular datatype
 * @author vsayajin
 */
interface IHessianCustomParser{
	function parse($parser, $data);
}

/**
 * Used for custom writers that handle a particular class type
 * @author vsayajin
 */
interface IHessianCustomWriter{
	function write($writer, $data);
}

class HessianCallingContext{
	public $writer;
	public $parser;
	public $transport;
	public $typemap;
	public $options;
	public $stream;
	public $isClient = true;
	public $call;
	public $url;
	public $payload;
}

/**
 * Defines a contract for an interceptor that executes around calls to remote services
 * in both client and servers
 * @author vsayajin
 */
interface IHessianInterceptor{
	function beforeRequest(HessianCallingContext $context);
	function afterRequest(HessianCallingContext $context);
}