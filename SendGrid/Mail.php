<?php

namespace SendGrid;

class Mail
{
  
  private $to_list, 
          $from,
          $cc_list,
          $bcc_list,
          $subject,
          $text,
          $html,
          $attachment_list,
          $header_list;

  public function __construct()
  {
    
  }
  
  /**
   * _removeFromList
   * Given a list of key/value pairs, removes the associated keys
   * where a value matches the given string ($item)
   * @param Array $list - the list of key/value pairs
   * @param String $item - the value to be removed
   */
  private function _removeFromList(&$list, $item)
  {
    foreach($list as $key => $val)
    {
      if($val == $item)
      {
        unset($list[$key]);
      }
    }
    //repack the indices
    $list = array_values($list);
  }
  
  /**
   * getTos
   * Return the list of recipients
   * @return list of recipients
   */
  public function getTos()
  {
    return $this->to_list;
  }
  
  /**
   * setTos
   * Initialize an array for the recipient 'to' field
   * Destroy previous recipient 'to' data.
   * @param Array $email - an array of email addresses
   * @return the SendGrid\Mail object.
   */
  public function setTos(array $email)
  { 
    $this->to_list = $email;
    return $this;
  }
  
  /**
   * setTo
   * Initialize a single email for the recipient 'to' field
   * Destroy previous recipient 'to' data.
   * @param String $email - a list of email addresses
   * @return the SendGrid\Mail object.
   */
  public function setTo($email_list)
  {
    $this->to_list = array($email_list);
    return $this;
  }
  
  /**
   * addTo
   * append an email address to the existing list of addresses
   * Preserve previous recipient 'to' data.
   * @param String $email - a single email address
   * @return the SendGrid\Mail object.
   */
  public function addTo($email)
  {
    $this->to_list[] = $email;
    return $this;
  }
  
  /**
   * removeTo
   * remove an email address from the list of recipient addresses
   * @param String $email - an email address to be removed
   * @return the SendGrid\Mail object.
   */
  public function removeTo($email)
  {
    $this->_removeFromList($this->to_list, $email);
    return $this;
  }
  
  /**
   * getFrom
   * get the from email address
   * @return the from email address
   */
  public function getFrom()
  {
    return $this->from;
  }
  
  /**
   * setFrom
   * set the from email
   * @param String $email - an email address
   * @return the SendGrid\Mail object.
   */
  public function setFrom($email)
  {
    $this->from = $email;
    return $this;
  }
  
  /**
   * getCc
   * get the Carbon Copy list of recipients
   * @return Array the list of recipients
   */
  public function getCcs()
  {
    return $this->cc_list;
  }
  
  /**
   * setCcs
   * Set the list of Carbon Copy recipients
   * @param String $email - a list of email addresses
   * @return the SendGrid\Mail object.
   */
  public function setCcs(array $email_list)
  {
    $this->cc_list = $email_list;
    return $this;
  }
  
  /**
   * setCc
   * Initialize the list of Carbon Copy recipients
   * destroy previous recipient data
   * @param String $email - a list of email addresses
   * @return the SendGrid\Mail object.
   */
  public function setCc($email)
  {
    $this->cc_list = array($email);
    return $this;
  }
  
  /**
   * addCc
   * Append an address to the list of Carbon Copy recipients
   * @param String $email - an email address
   * @return the SendGrid\Mail object.
   */
  public function addCc($email)
  {
    $this->cc_list[] = $email;
    return $this;
  }
  
  /**
   * removeCc
   * remove an address from the list of Carbon Copy recipients
   * @param String $email - an email address
   * @return the SendGrid\Mail object.
   */
  public function removeCc($email)
  {
    $this->_removeFromList($this->cc_list, $email);

    return $this;
  }

  /**
   * getBccs
   * return the list of Blind Carbon Copy recipients
   * @return Array - the list of Blind Carbon Copy recipients
   */
  public function getBccs()
  {
    return $this->bcc_list;
  }
  
  /**
   * setBccs
   * set the list of Blind Carbon Copy Recipients
   * @param Array $email_list - the list of email recipients to 
   * @return the SendGrid\Mail object.
   */
  public function setBccs($email_list)
  {
    $this->bcc_list = $email_list;
    return $this;
  }
  
  /**
   * setBcc
   * Initialize the list of Carbon Copy recipients
   * destroy previous recipient Blind Carbon Copy data
   * @param String $email - an email address
   * @return the SendGrid\Mail object.
   */
  public function setBcc($email)
  {
    $this->bcc_list = array($email);
    return $this;
  }
  
  /**
   * addBcc
   * Append an email address to the list of Blind Carbon Copy 
   * recipients
   * @param String $email - an email address
   */
  public function addBcc($email)
  {
    $this->bcc_list[] = $email;
    return $this;
  }

  /** 
   * removeBcc
   * remove an email address from the list of Blind Carbon Copy
   * addresses
   * @param String $email - the email to remove
   * @return the SendGrid\Mail object.
   */
  public function removeBcc($email)
  {
    $this->_removeFromList($this->bcc_list, $email);
    return $this;
  }

  /** 
   * getSubject
   * get the email subject
   * @return the email subject
   */
  public function getSubject()
  {
    return $this->subject;
  }

  /** 
   * setSubject
   * set the email subject
   * @param String $subject - the email subject
   * @return the SendGrid\Mail object
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
    return $this;
  }

  /** 
   * getText
   * get the plain text part of the email
   * @return the plain text part of the email
   */
  public function getText()
  {
    return $this->text;
  }

  /** 
   * setText
   * Set the plain text part of the email
   * @param String $text - the plain text of the email
   * @return the SendGrid\Mail object.
   */
  public function setText($text)
  {
    $this->text = $text;
    return $this;
  }
  
  /** 
   * getHtml
   * Get the HTML part of the email
   * @param String $html - the HTML part of the email
   * @return the HTML part of the email.
   */
  public function getHtml()
  {
    return $this->html;
  }

  /** 
   * setHTML
   * Set the HTML part of the email
   * @param String $html - the HTML part of the email
   * @return the SendGrid\Mail object.
   */
  public function setHtml($html)
  {
    $this->html = $html;
    return $this;
  }

  public function addAttachment($file)
  {
    
    return $this;
  }

  public function removeAttachment($file)
  {
    return $this;
  }

  /** 
   * setCategories
   * Set the list of category headers
   * destroys previous category header data
   * @param Array $category_list - the list of category values
   * @return the SendGrid\Mail object.
   */
  public function setCategories($category_list)
  {
    $this->header_list['category'] = $category_list;
    return $this;
  }

  /** 
   * addCategory
   * Append a category to the list of categories
   * @param String $category - the new category to append
   * @return the SendGrid\Mail object.
   */
  public function addCategory($category)
  {
    $this->header_list['category'][] = $category;
    return $this;
  }

  /** 
   * removeCategory
   * Given a category name, remove that category from the list
   * of category headers
   * @param String $category - the category to be removed
   * @return the SendGrid\Mail object.
   */
  public function removeCategory($category)
  {
    $this->_removeFromList($this->header_list['category'], $category);
    return $this;
  }

  /** 
   * SetSubstitutions
   *
   * Substitute a value for list of values, where each value corresponds
   * to the list emails in a one to one relationship. (IE, value[0] = email[0], 
   * value[1] = email[1])
   *
   * @param array $key_value_pairs - key/value pairs where the value is an array of values
   * @return the SendGrid\Mail object.
   */
  public function setSubstitutions($key_value_pairs)
  {
    $this->header_list['sub'] = $key_value_pairs;
    return $this;
  }

  /** 
   * addSubstitution
   * Substitute a value for list of values, where each value corresponds
   * to the list emails in a one to one relationship. (IE, value[0] = email[0], 
   * value[1] = email[1])
   *
   * @param string $from_key - the value to be replaced
   * @param array $to_values - an array of values to replace the $from_value
   * @return the SendGrid\Mail object.
   */
  public function addSubstitution($from_value, array $to_values)
  {
    $this->header_list['sub'][$from_value] = $to_values;
    return $this;
  }

  /** 
   * setSection
   * Set a list of section values
   * @param Array $key_value_pairs
   * @return the SendGrid\Mail object.
   */
  public function setSections(array $key_value_pairs)
  {
    $this->header_list['section'] = $key_value_pairs;
    return $this;
  }
  
  /** 
   * addSection
   * append a section value to the list of section values
   * @param String $from_value - the value to be replaced
   * @param String $to_value - the value to replace
   * @return the SendGrid\Mail object.
   */
  public function addSection($from_value, $to_value)
  {
    $this->header_list['section'][$from_value] = $to_value;
    return $this;
  }

  /** 
   * setUniqueArguments
   * Set a list of unique arguments, to be used for tracking purposes
   * @param array $key_value_pairs - list of unique arguments
   */
  public function setUniqueArguments(array $key_value_pairs)
  {
    $this->header_list['unique_args'] = $key_value_pairs;
    return $this;
  }
    
  /**
   * addUniqueArgument
   * Set a key/value pair of unique arguments, to be used for tracking purposes
   * @param string $key   - key
   * @param string $value - value
   */
  public function addUniqueArgument($key, $value)
  {
    $this->header_list['unique_args'][$key] = $value;
    return $this;
  }

  /**
   * setFilterSettings
   * Set filter/app settings
   * @param array $filter_settings - array of fiter settings
   */
  public function setFilterSettings($filter_settings)
  {
    $this->header_list['filters'] = $filter_settings;
    return $this;
  }
  
  /**
   * addFilterSetting
   * Append a filter setting to the list of filter settings
   * @param string $filter_name     - filter name
   * @param string $parameter_name  - parameter name
   * @param string $parameter_value - setting value 
   */
  public function addFilterSetting($filter_name, $parameter_name, $parameter_value)
  {
    $this->header_list['filters'][$filter_name]['settings'][$parameter_name] = $parameter_value;
    return $this;
  }
  
  /**
   * getHeaders
   * return the list of headers
   * @return Array the list of headers
   */
  public function getHeaders()
  {
    return $this->header_list;
  }

  /**
   * getHeaders
   * return the list of headers
   * @return Array the list of headers
   */
  public function getHeadersJson()
  {
    return json_encode($this->getHeaders(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
  }
  
  /**
   * setHeaders
   * Sets the list headers
   * destroys previous header data
   * @param Array $key_value_pairs - the list of header data
   * @return the SendGrid\Mail object.
   */
  public function setHeaders($key_value_pairs)
  {
    $this->header_list = $key_value_pairs;
    return $this;
  }
    
  /**
   * addHeaders
   * append the header to the list of headers
   * @param String $key - the header key
   * @param String $value - the header value
   */
  public function addHeader($key, $value)
  {
    $this->headers_list[$key] = $value;
    return $this;
  }
  
  /**
   * removeHeaders
   * remove a header key
   * @param String $key - the key to remove
   * @return the SendGrid\Mail object.
   */
  public function removeHeader($key)
  {
    unset($this->headers_list[$key]);
    return $this;
  }

}