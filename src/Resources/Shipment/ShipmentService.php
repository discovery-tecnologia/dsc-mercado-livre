<?php
/**
 * Class ShipmentService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources\Shipment;

use Dsc\MercadoLivre\BaseService;
use Dsc\MercadoLivre\Resources\ResourceService;

class ShipmentService extends BaseService implements ResourceService
{
    /**
     * @param $shipmentId
     * @return Shipment
     */
    public function findShipment($shipmentId)
    {
        return $this->getResponse(
            $this->get('/shipments/' . $shipmentId),
            Shipment::class
        );
    }
}
