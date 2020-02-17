<?php

namespace JacobDeKeizer\Statusweb\Enums;

class ResponseCode
{
    public const OK = 1;
    public const SHIPMENT_CREATED_BUT_NOT_SEND = -90;
    public const SESSION_ID_EXPIRED = -96;
    public const IP_ADDRESS_NOT_ALLOWED = -97;
    public const INVALID_SESSION_ID = -98;
    public const UNKNOWN_API_KEY = -99;
    public const NAME_INVALID = -100;
    public const ADDRESS_INVALID = -101;
    public const HOUSE_NUMBER_INVALID = -102;
    public const POSTAL_CODE_INVALID = -103;
    public const PLACE_INVALID = -104;
    public const COUNTRY_CODE_INVALID = -105;
    public const SHIPMENT_TYPE_INVALID = -107;
    public const SHIPMENT_ROW_AMOUNT_INVALID = -108;
    public const SHIPMENT_ROW_UNIT_INVALID = -109;
    public const SHIPMENT_ROW_WEIGHT_INVALID = -110;
    public const UNKNOWN_TRANSPORT_NUMBER = -150;
    public const NO_SHIPMENTS_TO_SEND = -180;
    public const NO_STATUSES_FOUND = -200;
    public const UNKNOWN_ARTICLE_NUMBER = -250;
    public const INSUFFICIENT_STOCK_FOR_SOME_ARTICLES = -300;
    public const UNKNOWN_ARTICLE = -310;
    public const NO_AMOUNT_FOR_SOME_ARTICLES = -320;
    public const NO_ETA_FOR_SHIPMENT = -320;
    public const NO_STATUS_URL_FOR_SHIPMENT = -500;
    public const UNKNOWN_RESULT_ID = -550;
}