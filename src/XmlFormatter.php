<?php

declare(strict_types=1);
/**
 * This file is part of Leonsw.
 *
 * @link     https://leonsw.com
 * @document https://docs.leonsw.com
 * @contact  leonsw.com@gmail.com
 * @license  https://leonsw.com/LICENSE
 */
namespace Leonsw\HttpClient;

use DOMDocument;
use DOMElement;
use DOMText;

class XmlFormatter
{
    /**
     * @var bool whether to interpret objects implementing the [[\Traversable]] interface as arrays.
     *           Defaults to `true`.
     * @since 2.0.1
     */
    public $useTraversableAsArray = true;

    /**
     * @var string the XML encoding. If not set, it will use the value of [[\yii\base\Application::charset]].
     */
    private $charset;

    private $version;

    public function __construct($version = '1.0', string $charset = 'UTF-8')
    {
        $this->version = $version;
        $this->charset = $charset;
    }

    public function format($data)
    {
        if ($data instanceof DOMDocument) {
            $content = $data->saveXML();
        } elseif ($data instanceof SimpleXMLElement) {
            $content = $data->saveXML();
        } else {
            $dom = new DOMDocument($this->version, $this->charset);
            $root = new DOMElement('request');
            $dom->appendChild($root);
            $this->buildXml($root, $data);
            $content = $dom->saveXML();
        }

        return $content;
    }

    /**
     * @param DOMElement $element
     * @param mixed $data
     */
    protected function buildXml($element, $data)
    {
        if (is_array($data) || ($data instanceof \Traversable && $this->useTraversableAsArray && ! $data instanceof Arrayable)) {
            foreach ($data as $name => $value) {
                if (is_int($name) && is_object($value)) {
                    $this->buildXml($element, $value);
                } elseif (is_array($value) || is_object($value)) {
                    $child = new DOMElement($name);
                    $element->appendChild($child);
                    $this->buildXml($child, $value);
                } else {
                    $child = new DOMElement($name);
                    $element->appendChild($child);
                    $child->appendChild(new DOMText((string) $value));
                }
            }
        } elseif (is_object($data)) {
            $child = new DOMElement(StringHelper::basename(get_class($data)));
            $element->appendChild($child);
            if ($data instanceof Arrayable) {
                $this->buildXml($child, $data->toArray());
            } else {
                $array = [];
                foreach ($data as $name => $value) {
                    $array[$name] = $value;
                }
                $this->buildXml($child, $array);
            }
        } else {
            $element->appendChild(new DOMText((string) $data));
        }
    }
}
