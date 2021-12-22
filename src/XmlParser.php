<?php

declare(strict_types=1);
/**
 * This file is part of Tianmiao.
 *
 * @link     https://leonsw.com
 * @document https://docs.leonsw.com
 * @contact  leonsw.com@gmail.com
 * @license  https://leonsw.com/LICENSE
 */
namespace Tianmiao\HttpClient;

use DOMDocument;

class XmlParser
{
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

    public function parse($data)
    {
        $dom = new DOMDocument($this->version, $this->charset);
        $dom->loadXML($data, LIBXML_NOCDATA);
        return $this->convertXmlToArray(simplexml_import_dom($dom->documentElement));
    }

    /**
     * Converts XML document to array.
     * @param \SimpleXMLElement|string $xml xml to process
     * @return array XML array representation
     */
    protected function convertXmlToArray($xml)
    {
        if (is_string($xml)) {
            $xml = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        }
        $result = (array) $xml;
        foreach ($result as $key => $value) {
            if (! is_scalar($value)) {
                $result[$key] = $this->convertXmlToArray($value);
            }
        }
        return $result;
    }
}
