package cn.fuego.laundry.ui.home;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import android.view.View;
import android.widget.RadioGroup;
import android.widget.RadioGroup.OnCheckedChangeListener;
import android.widget.TextView;
import cn.fuego.laundry.R;
import cn.fuego.laundry.webservice.up.model.GetProductListReq;
import cn.fuego.laundry.webservice.up.model.GetProductListRsp;
import cn.fuego.laundry.webservice.up.model.base.ProductJson;
import cn.fuego.laundry.webservice.up.rest.WebServiceContext;
import cn.fuego.misp.ui.list.MispListActivity;

public class HomeProductActivity extends MispListActivity<ProductJson> implements  OnCheckedChangeListener
{
	private Map<Integer,List<ProductJson>>  productMap = new HashMap<Integer, List<ProductJson>>();

	private int selectType = 0;

	@Override
	public void initRes()
	{
		this.activityRes.setAvtivityView(R.layout.home_goods_sel);
		this.listViewRes.setListView(R.id.product_list);
		this.listViewRes.setListItemView(R.layout.home_goods_item);
		
		ProductJson json = new ProductJson();
		json.setProduct_name("上衣");
		json.setPrice((float)1.1);
		dataList.clear();
		dataList.add(json);
		dataList.add(json);
		dataList.add(json);
		dataList.add(json);

		
	} 
	@Override
	public void loadSendList()
	{
		if(productMap.isEmpty())
		{
			GetProductListReq req = new GetProductListReq();
			WebServiceContext.getInstance().getProductManageRest(this).getAllProductList(req);
		}
		
	}

	@Override
	public List<ProductJson> loadListRecv(Object obj)
	{
		GetProductListRsp rsp = (GetProductListRsp) obj;
		refreshCache(rsp.getProductList());
		return this.productMap.get(selectType);
	}
	
	private void refreshCache(List<ProductJson> productList)
	{
		for(ProductJson json : productList)
		{	
			List<ProductJson> tempList = this.productMap.get(json.getType_id());
			if(null == tempList)
			{
				tempList = new ArrayList<ProductJson>();
				productMap.put(json.getType_id(), tempList);
			}
			tempList.add(json);
		}
	}

	@Override
	public View getListItemView(View view, ProductJson item)
	{
		TextView nameView = (TextView) view.findViewById(R.id.product_list_item_name);
		nameView.setText(item.getProduct_name());
		
		TextView priceView = (TextView) view.findViewById(R.id.product_list_item_curPrice);
		priceView.setText(String.valueOf(item.getPrice()));
		
 
		return view;
	}
 
	@Override
	public void onCheckedChanged(RadioGroup group, int checkedId)
	{
		int radioButtonId = group.getCheckedRadioButtonId();
		if (radioButtonId == R.id.RadioButton02)
		{   
 
			
		}
		refreshList(this.productMap.get(this.selectType));
		
	}
	


}
