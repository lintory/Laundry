package cn.fuego.laundry.webservice.up.model;

import java.util.ArrayList;
import java.util.List;

import cn.fuego.laundry.webservice.up.model.base.DeliveryInfoJson;
import cn.fuego.laundry.webservice.up.model.base.OrderDetailJson;
import cn.fuego.laundry.webservice.up.model.base.OrderJson;
import cn.fuego.misp.webservice.up.model.base.BaseJsonReq;

public class CreateOrderReq extends BaseJsonReq
{
	private OrderJson order = new OrderJson();
	private List<OrderDetailJson> orderDetailList = new ArrayList<OrderDetailJson>();
 	public OrderJson getOrder()
	{
		return order;
	}
	public void setOrder(OrderJson order)
	{
		this.order = order;
	}
	public List<OrderDetailJson> getOrderDetailList()
	{
		return orderDetailList;
	}
	public void setOrderDetailList(List<OrderDetailJson> orderDetailList)
	{
		this.orderDetailList = orderDetailList;
	}
 
	
	

}
