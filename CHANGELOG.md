# Changelog

## [v3.0.0] - 2026-06-22

### Breaking changes
- PHP requirement raised to `>=8.5`
- All resource and DTO objects now expose a promoted constructor; required (non-nullable) fields are constructor arguments, nullable fields default to `null`. Empty construction via `new X()` no longer works for objects with required fields — pass them to the constructor instead. Existing fluent setters/getters remain available for optional values.
- Statusweb SOAP API upgraded from v4 to v6
- All `Vrachtnummer` parameters and response fields renamed to `Zendingnummer` (shipment number)
- `ShipmentsEndpoint::getStatus()` parameter changed from `float` to `int`
- `ShipmentsEndpoint::delete()` parameter changed from `float` to `int`
- `ShipmentsEndpoint::getStatusUrl()` now returns `StatusweblinkResponse` instead of `string`
- `ShipmentsEndpoint::getAllStatuses()` now accepts optional `?string $mark` parameter for pagination and returns `StatusResponse` with `mark` and `more` fields
- `LabelsEndpoint::get()` parameter changed from `float` to `int`
- `SendShipmentsResponse::getSendShipmentData()` renamed to `getShipments()`
- `StatusDataResponse::getTransportNumber()` renamed to `getShipmentNumber()`
- `ShipmentResponse::getTransportNumber()` renamed to `getShipmentNumber()`
- `DeleteShipmentResponse::getTransportNumber()` renamed to `getShipmentNumber()`
- `SendShipmentResponse::getTransportNumber()` renamed to `getShipmentNumber()`
- `LabelResponse::getTransportNumber()` renamed to `getShipmentNumber()`
- `ResponseCode::COUNTRY_CODE_INVALID` split into `COUNTRY_CODE_DELIVERY_INVALID` (-105) and `COUNTRY_CODE_LOADING_INVALID` (-111)
- `ResponseCode::NO_ETA_FOR_SHIPMENT` corrected from -320 to -400
- `ResponseCode::UNKNOWN_RESULT_ID` renamed to `DELIVERY_REQUEST_NOT_FOUND` (-550)

### New features

#### TMS — new endpoint methods on `$client->shipments()`
- `addShipmentRow(int $shipmentNumber, ShipmentRow $row, LabelData $labelData): AddShipmentRowResponse`
- `deleteShipmentRow(int $shipmentNumber, int $rowId): DeleteShipmentRowResponse`
- `sendShipment(int $shipmentNumber): SendShipmentsResponse`
- `getInfo(int $shipmentNumber): ZendingInfoResponse`
- `getInfoSend(int $shipmentNumber): ZendingInfoResponse`
- `getPod(int $shipmentNumber): PodResponse`
- `getPhotos(int $shipmentNumber): FotoResponse`
- `getStatusTable(): StatusTableItem[]`
- `getShipmentTypeTable(): ShipmentTypeTableItem[]`

#### WMS — new endpoint `$client->wms()`
- `getInventory(): InventoryResponse`
- `getArticleInventory(string $articleNumber): InventoryResponse`
- `createDeliveryRequest(DeliveryRequest $request): DeliveryRequestResponse`
- `deleteDeliveryRequest(int $deliveryId): DeleteDeliveryResponse`
- `getDeliveryRequestStatus(int $deliveryId): DeliveryStatusResponse`
- `getShipmentsByDeliveryRequest(int $deliveryId): SendShipmentsResponse`

#### New resource classes
- `AdrData` — ADR (hazardous goods) request data for shipment rows
- `BarcodeData` — barcode request/response data
- `AddShipmentRowResponse`
- `DeleteShipmentRowResponse`
- `StatusweblinkResponse`
- `ShipmentInfoResponse` — full shipment detail response
- `PodResponse` — proof of delivery response
- `PhotoData`, `PhotoResponse` — delivery photo response
- `StatusTableItem`, `ShipmentTypeTableItem` — table lookup responses
- `Wms\ArticleData`, `Wms\DeliveryRequest`
- `Wms\InventoryItem`, `Wms\InventoryResponse`
- `Wms\DeliveryRequestResponse`, `Wms\DeleteDeliveryResponse`
- `Wms\DeliveryStatusItem`, `Wms\DeliveryStatusResponse`

#### Enhancements to existing resources
- `ShipmentRow` — added `barcodes` (BarcodeData[]) and `adr` (AdrData) properties (not sent in `PutZending`; API does not accept these fields in `ZendingregelData`)
- `ShipmentResponse` — added `statuswebLink`, `labelLength`, `barcodes`, `rowIds`
- `SendShipmentResponse` — added `statuswebLink`
- `LabelResponse` — added `labelLength`, `barcodes`
- `EtaResponse` — added `shipmentNumber`, `reference`
- `StatusResponse` — added `mark`, `hasMore` for paginated `GetStatus` polling
- `CountryCode` — added `LUXEMBOURG = 352`

---

## [v2.0.0]

- Statusweb SOAP API v4
- TMS functions: create, delete, send, getStatus, getAllStatuses, getStatusUrl, getEstimatedTimeOfArrival
- Labels endpoint: get label by shipment number
- Session management with configurable session store
