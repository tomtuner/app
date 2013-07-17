<?php

/**
 * Description of EVRRSSFeedViewModel
 *
 * @author Nikesh Hajari
 */

namespace EVRRSSFeed\Model;

use AppCore\Exception\ModelException;

class EVRRSSFeedViewModel
{

    /**
	 * Get Events
	 *
	 * Get Events form EVR RSS Feed Table
	 * @return \PropelObjectCollection
	 * @throws ModelException
	 */
    public function getEvents()
    {
        try
        {
			//the columns must be in the same order as the fields are in the schema for you to use the formatter class correctly
			//so you must specify the names
            $con = \Propel::getConnection(\EVRRSSFeedORM\EVRRSSFeedViewPeer::DATABASE_NAME);
            $sql = "SELECT event_id, event_name, event_description, event_status, event_responsible_representative_name, event_responsible_representative_email_address,"
					. " event_start_time, event_end_time, event_location, event_cost, event_start_time_filter, event_end_time_filter"
                    . " FROM evr_rss_feed_view"
                    . " WHERE event_start_time_filter"
                    . " BETWEEN SYSDATE() - INTERVAL 2 DAY AND SYSDATE() + INTERVAL 30 DAY"
                    . " ORDER BY event_start_time_filter ASC";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            
            $formatter = new \PropelObjectFormatter();
            $formatter->setClass('\EVRRSSFeedORM\EVRRSSFeedView');
            $resultSet = $formatter->format($stmt);
            
            return $resultSet;
        } catch(\Exception $e)
        {
            throw new ModelException('Error Getting Events', $e);
        }
    }

}

?>
