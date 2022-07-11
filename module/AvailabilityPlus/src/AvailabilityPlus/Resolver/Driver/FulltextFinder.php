<?php

namespace AvailabilityPlus\Resolver\Driver;

class FulltextFinder extends AvailabilityPlusResolver
{
    protected $openUrl;
    /**
     * Get Resolver Url
     *
     * Transform the OpenURL as needed to get a working link to the resolver.
     *
     * @param string $openURL openURL (url-encoded)
     *
     * @return string Returns resolver specific url
     */
    public function getResolverUrl($openUrl)
    {
        $url = '';
        if(!empty($this->baseUrl)) {
            $url = $this->baseUrl.$openUrl;
        }
        return $url;
    }

    /**
     * Fetch Links
     *
     * Fetches a set of links corresponding to an OpenURL
     *
     * @param string $openURL openURL (url-encoded)
     *
     * @return string         json returned by resolver
     */
    public function fetchLinks($openUrl)
    {
        $this->openUrl = $openUrl;
        $url = $this->getResolverUrl($openUrl);
        $password = $this->additionalParams;
        $headers = $this->httpClient->getRequest()->getHeaders();
        $headers->addHeaderLine('Accept', 'application/json');
        if(!empty($password)) $headers->addHeaderLine('password', $password);
        $feed = $this->httpClient->setUri($url)->send()->getBody();
        return $feed;
    }

    /**
     * Parse Links
     *
     * Parses an XML file returned by a link resolver
     * and converts it to a standardised format for display
     *
     * @param string $xmlstr Raw XML returned by resolver
     *
     * @return array         Array of values
     */
    public function parseLinks($data_org)
    {
        $urls = []; // to check for duplicate urls
        $records = []; // array to return
        $data = $data_org;
        $break = false;

        if (isset($fulltextfinderApiResult->contextObjects)) {
            foreach ($data->contextObjects as $contextObject) {
                if (isset($contextObject->targetLinks)) {
                    foreach ($contextObject->targetLinks as $targetLink) {
                        if ($targetLink->category == "Fulltext") {
                            $level = 'FulltextLeuphana';
                            $label = 'FulltextLeuphana';
                            $url = $targetLink;
                            $record['level'] = $level;
                            $record['label'] = $label;
                            $record['url'] = $url;
                            $records[] = $record;
                            $break = true;
                            break;
                        }
                    }
                }
                if($break) break;
            }
        }

 /*       if(empty($records)) {
            $record['level'] = $level;
            $record['label'] = $label;
            $record['url'] = $url;
        }*/

        $response['data'] = $data_org;
        $this->parsed_data = $records;
        $this->applyCustomChanges();
        $response['parsed_data'] = $this->parsed_data;
        return $response;
    }
}

